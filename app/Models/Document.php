<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'agent_id', 
        'stagiaire_id', 
        'type', 
        'reference', 
        'file_path', 
        'date_obtention'
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class);
    }
}