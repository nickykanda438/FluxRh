<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stagiaire extends Model
{
    use HasFactory;

    /**
     * Autoriser l'insertion de masse.
     */
    protected $guarded = [];

    /**
     * Relation inverse : Un Stagiaire appartient à un Agent (son encadreur).
     * @return BelongsTo
     */
    public function encadreur(): BelongsTo
    {
        // On précise 'agent_id' car c'est le nom de la colonne dans votre migration
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    public function scopeEnCours($query)
    {
        return $query->where('statut', 'encours');
    }
}
