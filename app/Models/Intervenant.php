<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervenant extends Model
{
    use HasFactory;

    protected $fillable=[
        'poste',
    ];

    public function users(){
        return $this->morphMany(User::class ,'usertable');
    }

    public function projects()
    {
        return $this->hasMany(Projet::class);
    }

    public function fiches()
    {
        return $this->hasMany(Fiche::class);
    }

    public function projets()
    {
        return $this->belongsToMany(Projet::class,'intervenant_projets');
    }

}
