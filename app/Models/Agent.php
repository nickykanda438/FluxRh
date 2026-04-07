<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agent extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'matricule',
        'categorie_grade',
        'nom',
        'prenom',
        'postnom',
        'genre',
        'date_naissance',
        'lieu_naissance',
        'etat_civil',
        'telephone',
        'email',
        'nbre_enfant',
        'niveau_etude',
        'domaine_etude',
        'annee_obtention',
        'nom_institution',
        'pays',
        'province',
        'ville',
        'coordination',
        'renumeration',
        'adresse',
        'date_embauche',
        'arrete',
        'nature_acte',  
        'unite',
        'departement',
        'division_id',
        'bureau_id',
        'status',
    ];

    /**
     * Les attributs qui doivent être castés.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_naissance' => 'date',
        'nbre_enfant' => 'integer',
        'annee_obtention' => 'integer',
    ];

    /**
     * Obtient la division à laquelle appartient l'agent.
     */
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    /**
     * Obtient le bureau auquel appartient l'agent.
     */
    public function bureau(): BelongsTo
    {
        return $this->belongsTo(Bureau::class);
    }
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}