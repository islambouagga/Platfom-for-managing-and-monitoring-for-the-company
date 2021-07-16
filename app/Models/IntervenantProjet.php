<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class IntervenantProjet extends Pivot
{
    use HasFactory;

    protected $fillable=[
        'intervenant_id',
        'projet_id',
    ];
}
