<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\Division;
use App\Models\Bureau;
use App\Models\Departement;
use App\Models\Document;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = Agent::with(['bureau.division'])->latest()->paginate(10);
        $bureaux = Bureau::all();
        $divisions = Division::all();


        $stats = [
            'countActifs' => Agent::where('status', 'Actif')->count(),
            'countDeserteurs' => Agent::where('status', 'Déserteur')->count(),
            'countRetraite' => Agent::where('date_naissance', '<=', now()->subYears(55))->count(),
            'countDecedes' => Agent::where('status', 'Décédé')->count(),
        ];
        return view('agents.index', compact('agents', 'stats', 'bureaux', 'divisions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bureaux = Bureau::all();
        $divisions = Division::all();
        return view('agents.create', compact('bureaux', 'divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'matricule' => 'required|string|unique:agents,matricule',
            'categorie_grade' => 'required|string',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'postnom' => 'nullable|string',
            'genre' => 'required|in:M,F',
            'etat_civil' => 'required|string',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string',
            'nbre_enfant' => 'nullable|integer',
            'telephone' => 'required|string',
            'email' => 'required|email|unique:agents,email',
            'pays' => 'nullable|string',
            'province' => 'required|string',
            'ville' => 'required|string',
            'adresse' => 'nullable|string',
            'niveau_etude' => 'required|string',
            'domaine_etude' => 'required|string',
            'nom_institution' => 'nullable|string',
            'annee_obtention' => 'nullable|string',
            'ref_document' => 'nullable|string',
            'date_obtention' => 'nullable|date',
            'departement' => 'nullable|string',
            'division_id' => 'required|exists:divisions,id',
            'coordination' => 'nullable|string',
            'bureau_id' => 'required|exists:bureaus,id',
            'unite' => 'nullable|string',
            'position' => 'nullable|string',
            'commission' => 'nullable|string',
            'date_embauche' => 'nullable|date',
            'nature_acte' => 'nullable|string',
            'arrete' => 'nullable|string',
            'remuneration' => 'nullable|string',
            'status' => 'nullable|in:actif,deserteur,decede,retraite',
            'carte_biometrique' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'documents_etude' => 'required|file|mimes:pdf,jpg,png|max:4096'
        ]);
        try {
                return DB::transaction(function () use ($request, $validatedData) {
                    $agent = Agent::create($validatedData);

                    if ($request->hasFile('documents_etude')) {
                        $pathEtude = $request->file('documents_etude')->store('agents/etudes', 'public');
                        Document::create([
                            'agent_id'       => $agent->id,
                            'type'           => 'Diplôme/Étude',
                            'file_path'      => $pathEtude,
                            'reference'      => $request->ref_document, 
                            'date_obtention' => $request->date_obtention, 
                        ]);
                    }

                    if ($request->hasFile('carte_biometrique')) {
                        $pathBio = $request->file('carte_biometrique')->store('agents/biometrie', 'public');
                        Document::create([
                            'agent_id'  => $agent->id,
                            'type'      => 'Carte Biométrique',
                            'file_path' => $pathBio,
                        ]);
                    }

                    return redirect()->route('agents.index')->with('success', 'Agent créé avec succès');
                });

            } catch (\Exception $e) {
                return back()
                    ->withInput()
                    ->withErrors(['error' => "Une erreur est survenue lors de l'enregistrement : " . $e->getMessage()]);
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $agent = Agent::with('documents')->findOrFail($id);
        return view('agents.show', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'status' => [
                'required',
                Rule::in(['actif', 'deserteur', 'decede', 'retraite']),
            ],
        ]);

        try {
            $agent = Agent::findOrFail($id);

            if ($agent->status === $validated['status']) {
                return redirect()->back()->with('error', "Le statut est déjà défini sur : " . ucfirst($agent->status));
            }

            $agent->update(['status' => $validated['status']]);

            return redirect()->back()->with('success', "Statut de {$agent->nom} mis à jour.");
                
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Erreur lors de la mise à jour.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agent = Agent::findOrFail($id);
        $agent->delete();
        return redirect()->route('agents.index')->with('success', 'L\'agent a été supprimé avec succès.');
    }
}