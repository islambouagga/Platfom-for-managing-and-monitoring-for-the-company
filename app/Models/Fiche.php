<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiche extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'valider',
        'type',
        // FICHE LABO
        'typeMateriaux',
        'provenance',
        'destination',
        'nbrElemCntrl',
        'dateEssai',
        'raliserPar',
        //recuperation doc
        'typeDocR',
        'lieuR',
        //depot doc
        'typeDocD',
        'lieuD',
        //reunion
        'natureReunion',
        'objetReunion',
        'participants',
        //essai in situ
        'typeCntrl',
        'natureEssai',
        'nbrPointsES',
        'traveauxControler',
        'lineaireES',
        //prelevement
        'typeMateriauxP',
        'provenancePrelev',
        'destinationPrelev',
        //assistance
        'natureTraveaux',
        'lineaireAss',
        'nbrPointsAss',
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function intervenant()
    {
        return $this->belongsTo(Intervenant::class);
    }
}
