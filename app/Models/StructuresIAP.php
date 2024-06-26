<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StructuresIAP extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function structuresAffectations()
    {
        return $this->hasMany(StructuresAffectation::class);
    }

    public function domaines()
    {
        return $this->hasMany(Domaine::class, 'structuresIAP_id');
    }
}
