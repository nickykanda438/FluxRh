<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bureau extends Model
{
    protected $fillable = [
        'nom', 
    ];

    public function agents()
    {
        return $this->hasMany(Agent::class);
    }
    public function stagiaires()
    {
        return $this->hasMany(Stagiaire::class);
    }
    public function divisions()
    {
        return $this->belongsTo(Division::class);
    }
}
