<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetArchive extends Model
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


    public function fichesArchives()
    {
        return $this->hasMany(FicheArchive::class,);
    }

    protected $connection = 'mysql2';
}
