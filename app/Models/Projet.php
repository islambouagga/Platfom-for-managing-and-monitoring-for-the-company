<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kossa\AlgerianCities\Wilaya;
class Projet extends Model
{


    use HasFactory;


    protected $fillable=[
        'dateOuverture',
        'dateFin',
        'designationPrj',
        'nomPrj',
        'typePrj',
        'raisonIntervention',
        'wilayas'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function intervenant()
    {
        return $this->belongsTo(Intervenant::class);
    }

    public function ChargePrj()
    {
        return $this->belongsTo(ChargePrj::class,'chargePrj_id');
    }

    public function fiches()
    {
        return $this->hasMany(Fiche::class);
    }

    public function intervenants()
    {
        return $this->belongsToMany(Intervenant::class,'intervenant_projets')->with('users');
    }


}
