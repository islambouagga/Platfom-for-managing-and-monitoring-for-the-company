<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FicheArchive extends Model
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

    public function projetArchive()
    {
        return $this->belongsTo(ProjetArchive::class);
    }

    protected $connection = 'mysql2';
}
