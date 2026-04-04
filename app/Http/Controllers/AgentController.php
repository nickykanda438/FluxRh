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

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = Agent::with(['bureau.division'])->latest()->paginate(10);

        $stats = [
            'countActifs' => Agent::where('status', 'Actif')->count(),
            'countDeserteurs' => Agent::where('status', 'Déserteur')->count(),
            'countRetraite' => Agent::where('date_naissance', '<=', now()->subYears(55))->count(),
            'countDecedes' => Agent::where('status', 'Décédé')->count(),
        ];

        $departments = Departement::all();
        $bureaus = Bureau::all();

        return view('agents.index', compact('agents', 'stats', 'departments', 'bureaus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bureaus = Bureau::all();
        return view('agents.create', compact('bureaus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // Identité de base
            'matricule'      => 'required|unique:agents,matricule',
            'nom'            => 'required|string|max:255',
            'postnom'        => 'required|string|max:255',
            'prenom'         => 'required|string|max:255',
            'bureau_id'      => 'required|exists:bureaus,id',
            
            // Nouveaux champs d'Identité & État Civil
            'categorie_grade' => 'nullable|string|max:255',
            'date_naissance'  => 'nullable|date',
            'lieu_naissance'  => 'nullable|string|max:255',
            'etat_civil'      => 'nullable|string|max:255',
            'genre'           => 'nullable|in:M,F',
            'telephone'       => 'nullable|string|max:20',
            'email'           => 'nullable|email|max:255',
            'adresse'         => 'nullable|string',
            'nbre_enfant'     => 'nullable|integer|min:0',

            // Études
            'niveau_etude'    => 'nullable|string|max:255',
            'domaine_etude'   => 'nullable|string|max:255',
            'annee_obtention' => 'nullable|string|max:4',
            'nom_institution' => 'nullable|string|max:255',
            'pays_etude'      => 'nullable|string|max:255',

            // Localisation
            'province'        => 'nullable|string|max:255',
            'ville'           => 'nullable|string|max:255',
            'coordination'    => 'nullable|string|max:255',
            'unite'           => 'nullable|string|max:255',
            'departement'     => 'nullable|string|max:255',

            // Professionnel
            'position'        => 'nullable|string|max:255',
            'date_embauche'   => 'nullable|date',
            'remuneration'    => 'nullable|numeric|min:0',
            'nature_acte'     => 'nullable|string|max:255',

            // Documents
            'doc_diplome'     => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'doc_biometrie'   => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'doc_affectation' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        return DB::transaction(function () use ($request) {
            
            // Extraction des données de l'agent (on exclut les fichiers et les champs techniques des docs)
            $agentData = $request->except([
                'doc_diplome', 'ref_diplome', 'date_diplome', 'type_diplome',
                'doc_biometrie', 'ref_biometrie', 'date_biometrie', 'type_biometrie',
                'doc_affectation', 'ref_affectation', 'date_affectation', 'type_affectation',
                '_token'
            ]);

            $agent = Agent::create($agentData);

            // Gestion des documents
            $documentConfigs = [
                'diplome'     => 'Diplôme',
                'biometrie'   => 'Carte Biométrique',
                'affectation' => "Acte d'affectation"
            ];

            foreach ($documentConfigs as $prefix => $typeLabel) {
                $fileKey = "doc_" . $prefix;
                
                if ($request->hasFile($fileKey)) {
                    $file = $request->file($fileKey);
                    $fileName = $agent->matricule . '_' . $prefix . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('documents/agents', $fileName, 'public');

                    $agent->documents()->create([
                        'type'           => $request->input("type_" . $prefix) ?? $typeLabel,
                        'reference'      => $request->input("ref_" . $prefix),
                        'file_path'      => $path,
                        'date_obtention' => $request->input("date_" . $prefix),
                        'stagiaire_id'   => null,
                    ]);
                }
            }

            return redirect()->route('agents.index')->with('success', "L'agent {$agent->nom} a été enregistré avec succès.");
        });
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