<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable=[
        'nomClt',
        'prenomClt',
        'emailClt',
        'adressClt',
        'dateNClt',
        'tel',
        'rc',
        'nif',
        'contact',
        'type',
        'raisonSociale',
        'fax',
        'designationClt',
        'quality',
        'wilayas',
    ];



    public function projects()
    {
        return $this->hasMany(Projet::class);
    }
}
