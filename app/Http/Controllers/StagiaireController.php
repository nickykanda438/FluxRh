<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    /**
     * Affiche la liste des stagiaires.
     */
    public function index()
    {
        // On récupère tous les stagiaires (on peut ajouter du tri ici)
        $stagiaires = Stagiaire::latest()->get();
        return view('stagiaires.index', compact('stagiaires'));
    }

    /**
     * Enregistre un nouveau stagiaire.
     */
    public function store(Request $request)
    {
        // 1. Validation des données du formulaire
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'postnom' => 'nullable|string|max:100',
            'genre' => 'required|in:M,F',
            'telephone' => 'nullable|string|max:20',
            'email' => 'required|email|unique:stagiaires,email',
            'type_stagiaire' => 'required|string',
            'institution_provenance' => 'nullable|string',
            'domaine_etude_ou_competence' => 'nullable|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'service_affectation' => 'nullable|string',
        ]);

        // 2. Création dans la base de données
        Stagiaire::create($validated);

        // 3. Redirection avec un message de succès
        return redirect()->route('stagiaires.index')
                         ->with('success', 'Le stagiaire a été enregistré avec succès.');
    }

    /**
     * Affiche le formulaire de modification (si vous utilisez une page dédiée).
     */
    public function edit(Stagiaire $stagiaire)
    {
        return view('stagiaires.edit', compact('stagiaire'));
    }

    /**
     * Met à jour les informations d'un stagiaire.
     */
    public function update(Request $request, Stagiaire $stagiaire)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'postnom' => 'nullable|string|max:100',
            'genre' => 'required|in:M,F',
            'telephone' => 'nullable|string|max:20',
            'email' => 'required|email|unique:stagiaires,email,' . $stagiaire->id,
            'type_stagiaire' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
        ]);

        $stagiaire->update($validated);

        return redirect()->route('stagiaires.index')
                         ->with('success', 'Les informations du stagiaire ont été mises à jour.');
    }

    /**
     * Supprime un stagiaire.
     */
    public function destroy(Stagiaire $stagiaire)
    {
        $stagiaire->delete();

        return redirect()->route('stagiaires.index')
                         ->with('success', 'Le stagiaire a été supprimé.');
    }
}