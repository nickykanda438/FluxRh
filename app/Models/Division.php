<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'nom',
        'departement_id'
    ];
    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
    public function bureaus()
    {
        return $this->hasMany(Bureau::class);
    }
}
