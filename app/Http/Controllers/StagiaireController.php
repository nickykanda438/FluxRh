<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    
    public function index()
    {
        $stagiaires = Stagiaire::all();

        // Calcul des stats
        $stats = [
            'total' => $stagiaires->count(),
            'academique' => $stagiaires->where('type_stagiaire', 'académique')->count(),
            'professionnel' => $stagiaires->where('type_stagiaire', 'professionnel')->count(),
            'en_cours' => $stagiaires->where('statut', 'encours')->count(),
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
                $stagiaire = Stagiaire::create($validated);

                return redirect()
                    ->route('stagiaires.index')
                    ->with('success', "Le stagiaire {$stagiaire->nom} {$stagiaire->prenom} a été enregistré avec succès.");

            } catch (\Exception $e) {
                return redirect()
                    ->back()
                    ->with('error', "Une erreur est survenue lors de l'enregistrement en base de données.");
            }
    }

    public function edit(Stagiaire $stagiaire)
    {
        return view('stagiaires.edit', compact('stagiaire'));
    }

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

    public function destroy(Stagiaire $stagiaire)
    {
        $stagiaire->delete();

        return redirect()->route('stagiaires.index')
                         ->with('success', 'Le stagiaire a été supprimé.');
    }
}