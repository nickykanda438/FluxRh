<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Stagiaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'prenom', 'postnom', 'genre', 'telephone', 'email',
        'type_stagiaire', 'institution_provenance', 'domaine_etude_ou_competence', 
        'date_debut', 'date_fin', 'statut', 'agent_id', 'service_affectation', 'observation_finale'
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];

    // --- SCOPES DE RECHERCHE ---

    public function scopeSearch(Builder $query, $term)
    {
        return $query->when($term, function ($q) use ($term) {
            $q->where(function ($sub) use ($term) {
                $sub->where('nom', 'like', "%{$term}%")
                    ->orWhere('prenom', 'like', "%{$term}%")
                    ->orWhere('email', 'like', "%{$term}%");
            });
        });
    }

    public function scopeDansPeriode(Builder $query, $debut, $fin)
    {
        return $query->when($debut, function ($q) use ($debut) {
            $q->where('date_debut', '>=', $debut);
        })->when($fin, function ($q) use ($fin) {
            $q->where('date_fin', '<=', $fin);
        });
    }

    public function scopeSelonEtat(Builder $query, $etat)
    {
        $aujourdhui = now()->toDateString();
        return $query->when($etat, function ($q) use ($etat, $aujourdhui) {
            if ($etat === 'termine') {
                return $q->where('date_fin', '<', $aujourdhui);
            }
            if ($etat === 'en_cours') {
                return $q->where('date_debut', '<=', $aujourdhui)
                         ->where('date_fin', '>=', $aujourdhui);
            }
        });
    }

    // --- RELATIONS ---
    public function agent() { return $this->belongsTo(Agent::class); }
}