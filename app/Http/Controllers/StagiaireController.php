<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StagiaireController extends Controller
{
    public function index(Request $request)
    {
        $stagiaires = Stagiaire::query()
            ->search($request->search)
            ->dansPeriode($request->debut, $request->fin)
            ->selonEtat($request->etat)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $aujourdhui = now()->toDateString();
        $stats = [
            'total'         => Stagiaire::count(),
            'academique'    => Stagiaire::where('type_stagiaire', 'Académique')->count(),
            'professionnel' => Stagiaire::where('type_stagiaire', 'Professionnel')->count(),
            'en_cours'      => Stagiaire::selonEtat('en_cours')->count(),
            'termines'      => Stagiaire::selonEtat('termine')->count(),
        ];

        return view('stagiaires.index', compact('stagiaires', 'stats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'postnom' => 'nullable|string|max:100',
            'genre' => 'required|in:M,F',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:stagiaires,email',
            'type_stagiaire' => 'required|string',
            'institution_provenance' => 'required|string',
            'domaine_etude_ou_competence' => 'required|string', 
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'service_affectation' => 'nullable|string',
        ]);

        try {
            Stagiaire::create($validated);
            return redirect()->route('stagiaires.index')->with('success', "Stagiaire ajouté avec succès.");
        } catch (\Exception $e) {
            Log::error("Erreur création stagiaire: " . $e->getMessage());
            return back()->withInput()->with('error', "Erreur lors de l'enregistrement.");
        }
    }

    // Cette méthode manquait et causait l'erreur
    public function edit(Stagiaire $stagiaire)
    {
        // On retourne la vue d'édition en passant les données du stagiaire
        return view('stagiaires.edit', compact('stagiaire'));
    }

    public function update(Request $request, Stagiaire $stagiaire)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'postnom' => 'nullable|string|max:100',
            'genre' => 'required|in:M,F',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:stagiaires,email,' . $stagiaire->id,
            'type_stagiaire' => 'required|string',
            'institution_provenance' => 'required|string',
            'domaine_etude_ou_competence' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'service_affectation' => 'nullable|string',
        ]);

        $stagiaire->update($validated);
        return redirect()->route('stagiaires.index')->with('success', 'Informations mises à jour.');
    }

    public function destroy(Stagiaire $stagiaire)
    {
        $stagiaire->delete();
        return redirect()->route('stagiaires.index')->with('success', 'Stagiaire supprimé.');
    }
}