<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = 
    [
        'matricule', 
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
        'bureau_id', 
        'status'
    ];

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
}