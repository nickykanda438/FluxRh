<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bureau extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 
        'division_id'
    ];

    public function agents()
    {
        return $this->hasMany(Agent::class);
    }
    public function stagiaires()
    {
        return $this->hasMany(Stagiaire::class);
    }
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
