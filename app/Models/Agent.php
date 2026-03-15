<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agent extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Relation : Un Agent encadre plusieurs Stagiaires.
     * * @return HasMany
     */
    public function stagiaires(): HasMany
    {
        return $this->hasMany(Stagiaire::class);
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->nom} {$this->prenom} {$this->postnom}";
    }
}