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
        return view('agents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'matricule'       => 'required|unique:agents,matricule',
            'nom'             => 'required|string|max:255',
            'postnom'         => 'required|string|max:255',
            'prenom'          => 'required|string|max:255',
            'bureau_id'       => 'required|exists:bureaus,id',
            'doc_diplome'     => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'doc_biometrie'   => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'doc_affectation' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'ref_diplome'     => 'nullable|string',
            'date_diplome'    => 'nullable|date',
        ]);

        return DB::transaction(function () use ($request) {
            
            $agentData = $request->except([
                'doc_diplome', 
                'ref_diplome', 
                'date_diplome', 
                'type_diplome',
                'doc_biometrie', 
                'ref_biometrie', 
                'date_biometrie', 
                'type_biometrie',
                'doc_affectation', 
                'ref_affectation', 
                'date_affectation', 
                'type_affectation',
                '_token'
            ]);

            $agent = Agent::create($agentData);

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

            return redirect()->route('agents.index')->with('success', 'L\'agent ' . $agent->nom . ' a été enregistré avec succès.');
        });
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $agent = Agent::findOrFail($id);
        $document = Document::where('agent_id', $agent->id)->first();
        return view('agents.show', compact('agent', 'document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
                return redirect()
                    ->back()
                    ->with('error', "Le statut de l'agent est déjà défini sur : " . ucfirst($agent->status) . ". Aucune modification effectuée.");
            }

            $agent->update([
                'status' => $validated['status']
            ]);

            return redirect()
                ->back()
                ->with('success', "Le statut de l'agent {$agent->nom} a été mis à jour avec succès.");
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', "Une erreur est survenue lors de la mise à jour.");
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
