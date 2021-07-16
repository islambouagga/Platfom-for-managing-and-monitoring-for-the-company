<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Wilaya;
use Illuminate\Http\Request;

class ClientController extends Controller
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
       $this->authorize('isAgentTCOrChargePrjOrDirecteurOrAdmin');

        $clients=Client::all();
        return $clients ;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Client $client)
    {
        $this->authorize('isAgentTC');
//        dd($request->all());
        $this->validate($request,[
            'nomClt' => 'required|string|max:191',
            'prenomClt' => 'required|string|max:191',
            'emailClt' => 'required|string|email|max:191|unique:clients',  //clients=table
            'adressClt' => 'required|string|max:191',
            'dateNClt' => 'required',
            'tel' => 'required',
           //'rc' => 'required',
            //'nif' => 'required',
            'contact' => 'required|string|max:191',
            'type' => 'required|string|max:191',
           // 'raisonSociale' => 'required|string|max:191',
           // 'fax' => 'required',
            'designationClt' => 'required|string|max:191',
            'quality' => 'required|string|max:191',
            'wilayas' => 'required',
        ]);

        $client->nomClt = $request->nomClt;
        $client->prenomClt = $request->prenomClt;
        $client->emailClt = $request->emailClt;
        $client->adressClt = $request->adressClt;
        $client->dateNClt = $request->dateNClt;
        $client->tel = $request->tel;
        $client->rc = $request->rc;
        $client->nif = $request->nif;
        $client->contact = $request->contact;
        $client->type = $request->type;
        $client->raisonSociale = $request->raisonSociale;
        $client->fax = $request->fax;
        $client->designationClt = $request->designationClt;
        $client->quality = $request->quality;
        $client->wilayas = $request->wilayas;

        $client->save();
        return $client;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $this->authorize('isAgentTCOrChargePrjOrDirecteurOrAdmin');

        return $client;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $this->authorize('isAgentTC');
//        dd($request->all());
        $client->nomClt = $request->nomClt;
        $client->prenomClt = $request->prenomClt;
        $client->emailClt = $request->emailClt;
        $client->adressClt = $request->adressClt;
        $client->dateNClt = $request->dateNClt;
        $client->tel = $request->tel;
        $client->rc = $request->rc;
        $client->nif = $request->nif;
        $client->contact = $request->contact;
        $client->type = $request->type;
        $client->raisonSociale = $request->raisonSociale;
        $client->fax = $request->fax;
        $client->designationClt = $request->designationClt;
        $client->quality = $request->quality;
        $client->wilayas = $request->wilayas;
        $client->save();
        return $client;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $this->authorize('isAgentTC');
        foreach ($client->projects as $project){

            $project->client_id =  null;
            $project->client()->dissociate();
            $project->save();
        }
        $client->delete();
    }
}
