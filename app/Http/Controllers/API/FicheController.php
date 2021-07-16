<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Fiche;
use App\Models\Intervenant;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FicheController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isAgentTCOrChargePrjOrDirecteurOrIntervenant');

        $fiches =  Fiche::all();
        return $fiches;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Fiche $fiche)
    {
        $this->authorize('isIntervenant');
        //$fiche->date = $request->date;
        $fiche->valider = 0;
        $fiche->type = $request->type;
        //fiche labo
        $fiche->typeMateriaux = $request->typeMateriaux;
        $fiche->provenance = $request->provenance;
        $fiche->destination = $request->destination;
        $fiche->nbrElemCntrl = $request->nbrElemCntrl;
        $fiche->dateEssai = $request->dateEssai;
        $fiche->raliserPar = $request->raliserPar;
        //recuperation doc
        $fiche->typeDocR = $request->typeDocR;
        $fiche->lieuR = $request->lieuR;
        //depot doc
        $fiche->typeDocD = $request->typeDocD;
        $fiche->lieuD = $request->lieuD;
        //reunion
        $fiche->natureReunion = $request->natureReunion;
        $fiche->objetReunion = $request->objetReunion;
        $fiche->participants = $request->participants;
        //essai in situ
        $fiche->typeCntrl = $request->typeCntrl;
        $fiche->natureEssai = $request->natureEssai;
        $fiche->nbrPointsES = $request->nbrPointsES;
        $fiche->traveauxControler = $request->traveauxControler;
        $fiche->lineaireES = $request->lineaireES;
        //prelevement
        $fiche->typeMateriauxP = $request->typeMateriauxP;
        $fiche->provenancePrelev = $request->provenancePrelev;
        $fiche->destinationPrelev = $request->destinationPrelev;
        //assistance
        $fiche->natureTraveaux = $request->natureTraveaux;
        $fiche->lineaireAss = $request->lineaireAss;
        $fiche->nbrPointsAss = $request->nbrPointsAss;

        $projet = Projet::findOrFail($request->projet_id);
        $fiche->projet_id = $projet->id;
        $fiche->projet()->associate($projet);

        $intervenant = Intervenant::findOrFail(Auth::user()->usertable_id);
        $fiche->intervenant_id = $intervenant->id;
        $fiche->intervenant()->associate($intervenant);

        $fiche-> save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fiche  $fiche
     * @return \Illuminate\Http\Response
     */
    public function show(Fiche $fiche)
    {
        $this->authorize('isAgentTCOrChargePrjOrDirecteurOrIntervenant');

        return $fiche;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fiche  $fiche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fiche $fiche)
    {
        $this->authorize('isChargePrj');

        $fiche->valider = $request->valider;
        $fiche->type = $request->type;
        //fiche labo
        $fiche->typeMateriaux = $request->typeMateriaux;
        $fiche->provenance = $request->provenance;
        $fiche->destination = $request->destination;
        $fiche->nbrElemCntrl = $request->nbrElemCntrl;
        $fiche->dateEssai = $request->dateEssai;
        $fiche->raliserPar = $request->raliserPar;
        //recuperation doc
        $fiche->typeDocR = $request->typeDocR;
        $fiche->lieuR = $request->lieuR;
        //depot doc
        $fiche->typeDocD = $request->typeDocD;
        $fiche->lieuD = $request->lieuD;
        //reunion
        $fiche->natureReunion = $request->natureReunion;
        $fiche->objetReunion = $request->objetReunion;
        $fiche->participants = $request->participants;
        //essai in situ
        $fiche->typeCntrl = $request->typeCntrl;
        $fiche->natureEssai = $request->natureEssai;
        $fiche->nbrPointsES = $request->nbrPointsES;
        $fiche->traveauxControler = $request->traveauxControler;
        $fiche->lineaireES = $request->lineaireES;
        //prelevement
        $fiche->typeMateriauxP = $request->typeMateriauxP;
        $fiche->provenancePrelev = $request->provenancePrelev;
        $fiche->destinationPrelev = $request->destinationPrelev;
        //assistance
        $fiche->natureTraveaux = $request->natureTraveaux;
        $fiche->lineaireAss = $request->lineaireAss;
        $fiche->nbrPointsAss = $request->nbrPointsAss;

        $projet = Projet::findOrFail($request->projet_id);
        $fiche->projet_id = $projet->id;
        $fiche->projet()->associate($projet);

        $intervenant = Intervenant::findOrFail($request->intervenant_id);
        $fiche->intervenant_id = $intervenant->id;
        $fiche->intervenant()->associate($intervenant);

        $fiche-> save();
        return $fiche;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fiche  $fiche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fiche $fiche)
    {
        //
    }
}
