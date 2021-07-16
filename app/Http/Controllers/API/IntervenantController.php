<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Intervenant;

use App\Models\Projet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IntervenantController extends Controller
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

        $intervenants = Intervenant::with('users')->with('projets')->with('projects')->get();
        return $intervenants;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Intervenant $intervenant)
    {

      // dd($request->all());
        $this->authorize('isAgentTC');
        $this->validate($request,[
            'poste' => 'required|string|max:191',
            'nomUtilis' => 'required|string|max:191',
            'prenomUtilis' => 'required|string|max:191',
            'password'=> 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            'adressUtilis' => 'required|string|max:191',
            'tel' => 'required',
            'dateNUtilis' => 'required',
        ]);

        $intervenant->poste = $request-> poste; //Creation intérvenant
        $intervenant-> save();

        User::create([    // Creation compte intérvenant
            'nomUtilis'=> $request['nomUtilis'],
            'prenomUtilis'=> $request['prenomUtilis'],
            'email'=> $request['email'],
            'adressUtilis'=> $request['adressUtilis'],
            'tel'=> $request['tel'],
            'usertable_id'=>$intervenant->id,
            'usertable_type'=> $request['usertable_type'],
            'password'=> Hash::make($request['password']),
            'dateNUtilis'=> $request['dateNUtilis'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Intervenant  $intervenant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('isAgentTCOrChargePrjOrDirecteurOrIntervenantOrAdmin');

        $intervenant =  Intervenant::findOrFail($id)->with('users')->get();
       return $intervenant ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Intervenant  $intervenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Intervenant $intervenant)
    {
        $this->authorize('isAgentTC');
//        dd($request->all());
        $intervenant->update($request->all());

        foreach ($intervenant->users()->get() as $user){
        $user->nomUtilis= $request-> nomUtilis;
        $user->prenomUtilis= $request->prenomUtilis;
        $user->email= $request->email;
        $user->adressUtilis= $request->adressUtilis;
        $user->tel= $request->tel;
        $user->usertable_type= $request->usertable_type;
            if(!empty($request->password)){
                $request->merge(['password' => Hash::make($request['password'])]);
            }
        $user->dateNUtilis= $request->dateNUtilis;
        $user->save();
        }
        return   $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Intervenant  $intervenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Intervenant $intervenant)
    {
        $this->authorize('isAgentTC');
        foreach ($intervenant->projects as $project){
            $project->intervenant_id =  null;
        $project->intervenant()->dissociate();
        $project->save();
        }

        $intervenant->users()->delete(); //supprimer user
        $intervenant->delete(); //supp intervenant
    }

    public function projetsInterv(Request $request){ // les projets d'un intervenaant
        $this->authorize('isChargePrj');
        return Intervenant::findOrfail($request->intervenant_id)->load('projets');
    }

}
