<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        // Identité de base
        'matricule',
        'nom',
        'postnom',
        'prenom',
        'genre',
        'date_naissance',
        'lieu_naissance',
        'etat_civil',
        'telephone',
        'email',
        'adresse',
        'nbre_enfant',
        
        // Études & Formation
        'niveau_etude',
        'domaine_etude',
        'annee_obtention',
        'nom_institution',
        'pays_etude',

        // Localisation & Structure
        'province',
        'ville',
        'coordination',
        'unite',
        'departement',
        'division_nom',
        'bureau_id',

        // Professionnel & Carrière
        'categorie_grade',
        'position',
        'date_embauche',
        'commission_affectation',
        'arrete',
        'remuneration',
        'nature_acte',
        'status'
    ];

    /**
     * Relations
     */

    public function stagiaires()
    {
        return $this->hasMany(Stagiaire::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function bureau()
    {
        return $this->belongsTo(Bureau::class);
    }

    /**
     * Accesseurs & Utilitaires (Optionnel)
     */

    // Pour afficher le nom complet facilement
    public function getFullNameAttribute()
    {
        return "{$this->nom} {$this->postnom} {$this->prenom}";
    }
}