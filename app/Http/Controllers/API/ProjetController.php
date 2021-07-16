<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AgentTC;
use App\Models\ChargePrj;
use App\Models\Client;
use App\Models\FicheArchive;
use App\Models\Intervenant;
use App\Models\Projet;
use App\Models\ProjetArchive;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $test = null;
//        $this->authorize('isAgentTCOrChargePrjOrDirecteurOrIntervenant');

//        if (Auth::user()->usertable_type ==='ChargePrj'){
//            $ChargePrj = ChargePrj::findOrFail(Auth::user()->usertable_id);

//            $projetsch =  $ChargePrj->projects();

//        }else{
            $projets =projet::with('intervenants')->with('fiches')->get();
//        }


        return($projets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Projet $projet)
    {

        $this->authorize('isAgentTC');
        $this->validate($request,[
            'nomPrj' => 'required|string|max:191',
            'dateOuverture' => 'required',
            'dateFin' => 'required',
            'typePrj' => 'required|string|max:191',
            'wilayas' => 'required',
            'designationPrj' => 'required|string|max:191',
            'raisonIntervention' => 'required',
            'client_id' => 'required',
            'intervenant_id' => 'required',
        ]);


        $projet->dateOuverture = $request->dateOuverture;
        $projet->dateFin = $request->dateFin;
        $projet->designationPrj = $request->designationPrj;
        $projet->nomPrj = $request->nomPrj;
        $projet->typePrj = $request->typePrj;
        $projet->raisonIntervention = $request->raisonIntervention;
        $projet->wilayas = $request->wilayas;

        $client = Client::findOrFail($request->client_id);
        $projet->client_id = $client->id;
        $projet->client()->associate($client);

        $intervenant = Intervenant::findOrFail($request->intervenant_id);
        $projet->intervenant_id = $intervenant->id;
        $projet->intervenant()->associate($intervenant);


        $chargePrj = ChargePrj::findOrFail($request->chargePrj_id);
        $projet->chargePrj_id = $chargePrj->id;
        $projet->chargePrj()->associate($chargePrj);

        $projet-> save();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show(Projet $projet)
    {
        $this->authorize('isAgentTCOrChargePrjOrDirecteurOrIntervenant');
        return $projet;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projet $projet)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet, ProjetArchive $projetArchive  )
    {
        $projetArchive->dateOuverture = $projet->dateOuverture;
        $projetArchive->dateFin = $projet->dateFin;
        $projetArchive->designationPrj = $projet->designationPrj;
        $projetArchive->nomPrj = $projet->nomPrj;
        $projetArchive->typePrj = $projet->typePrj;
        $projetArchive->raisonIntervention = $projet->raisonIntervention;
        $projetArchive->wilayas = $projet->wilayas;
        $projetArchive->client_id = $projet->client_id;
        $projetArchive->intervenant_id = $projet->intervenant_id;
            $projetArchive->chargePrj_id = $projet->chargePrj_id;
        $projetArchive-> save();

        $projet->client()->disassociate();
        $projet->intervenant()->disassociate();
        $projet->ChargePrj()->disassociate();
        foreach ($projet->fiches as $fich){
            $ficheArchive = new FicheArchive();
            $ficheArchive->valider = $fich->valider;
            $ficheArchive->type = $fich->type;
            //fiche labo
            $ficheArchive->typeMateriaux = $fich->typeMateriaux;
            $ficheArchive->provenance = $fich->provenance;
            $ficheArchive->destination = $fich->destination;
            $ficheArchive->nbrElemCntrl = $fich->nbrElemCntrl;
            $ficheArchive->dateEssai = $fich->dateEssai;
            $ficheArchive->raliserPar = $fich->raliserPar;
            //recuperation doc
            $ficheArchive->typeDocR = $fich->typeDocR;
            $ficheArchive->lieuR = $fich->lieuR;
            //depot doc
            $ficheArchive->typeDocD = $fich->typeDocD;
            $ficheArchive->lieuD = $fich->lieuD;
            //reunion
            $ficheArchive->natureReunion = $fich->natureReunion;
            $ficheArchive->objetReunion = $fich->objetReunion;
            $ficheArchive->participants = $fich->participants;
            //essai in situ
            $ficheArchive->typeCntrl = $fich->typeCntrl;
            $ficheArchive->natureEssai = $fich->natureEssai;
            $ficheArchive->nbrPointsES = $fich->nbrPointsES;
            $ficheArchive->traveauxControler = $fich->traveauxControler;
            $ficheArchive->lineaireES = $fich->lineaireES;
            //prelevement
            $ficheArchive->typeMateriauxP = $fich->typeMateriauxP;
            $ficheArchive->provenancePrelev = $fich->provenancePrelev;
            $ficheArchive->destinationPrelev = $fich->destinationPrelev;
            //assistance
            $ficheArchive->natureTraveaux = $fich->natureTraveaux;
            $ficheArchive->lineaireAss = $fich->lineaireAss;
            $ficheArchive->nbrPointsAss = $fich->nbrPointsAss;
            $ficheArchive->projet_archive_id = $projetArchive->id;
            $ficheArchive->projetArchive()->associate($projetArchive);
            $ficheArchive->intervenant_id = $fich->intervenant_id;
            $ficheArchive-> save();
            $fich->projet()->disassociate();
            $fich->intervenant()->disassociate();
            $fich->delete();
        }
        $projet->intervenants()->detach();
        $projet->delete();
    }

    public function affecterInt(Request $request){
        $this->authorize('isChargePrj');
//        dd($request->all());
        $projet=Projet::findOrfail($request->projet_id);
        $projet->intervenants()->detach();
        $projet->intervenants()->attach($request->arrayIntervenant_ids);
    }

    public function desaffecterInt(Request $request){
        $this->authorize('isChargePrj');
        $projet=Projet::findOrfail($request->projet_id);
        $projet->intervenants()->detach($request->intervenant_id);
    }

    public function intervPrj(Request $request){ // les intérvenants d'un prj
        $this->authorize('isChargePrj');
      return Projet::findOrfail($request->projet_id)->load('intervenants');

    }

}
