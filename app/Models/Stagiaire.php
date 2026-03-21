<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 
        'prenom', 
        'postnom', 
        'genre', 
        'telephone', 
        'email',
        'type_stagiaire', 
        'institution_provenance', 
        'domaine_etude',
        'date_debut', 
        'date_fin', 
        'statut', 
        'agent_id', 
        'service_affectation', 
        'observation_finale'
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}