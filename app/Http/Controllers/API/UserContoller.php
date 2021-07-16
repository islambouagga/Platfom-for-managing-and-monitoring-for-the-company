<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ChargePrj;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserContoller extends Controller
{
    public function Login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('appToken')->accessToken;
            return response()->json([
                'success' => true,
                'token' => $success,
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password ',
            ], 401);
        }
    }

    public function Logout(Request $request)
    {
        if (Auth::user()) {
            $user = Auth::user()->token();
            $user->revoke();

            return response()->json([
                'success' => true,
                'message' => 'Logout successfully '
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to Logout'
            ]);
        }
    }

    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function createChargerPrj(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'nomUtilis' => 'required|string|max:191',
            'prenomUtilis' => 'required|string|max:191',
            'password' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            'adressUtilis' => 'required|string|max:191',
            'tel' => 'required',
            'dateNUtilis' => 'required',
        ]);


        $chergerprj = ChargePrj::create();

        return User::create([
            'nomUtilis' => $request['nomUtilis'],
            'prenomUtilis' => $request['prenomUtilis'],
            'adressUtilis' => $request['adressUtilis'],
            'tel' => $request['tel'],
            'usertable_type' => 'ChargePrj',
            'usertable_id' => $chergerprj->id,
            'email' => $request['email'],
            'dateNUtilis' => $request['dateNUtilis'],
            'password' => Hash::make($request['password']),
        ]);
    }

    public function update(Request $request, $id)
    {
//        dd($id, $request->all());
        $user = User::findOrFail($id);
        $this->validate($request, [
            'nomUtilis' => 'required|string|max:191',
            'prenomUtilis' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,' . $user->id,
            'password' => 'sometimes|min:6',
            'adressUtilis' => 'required|string|max:191',
            'tel' => 'required',
            'dateNUtilis' => 'required',
        ]);

        $user->nomUtilis= $request-> nomUtilis;
        $user->prenomUtilis= $request->prenomUtilis;
        $user->email= $request->email;
        $user->adressUtilis= $request->adressUtilis;
        $user->tel= $request->tel;
        $user->usertable_type= $request->usertable_type;
       $user->password = Hash::make($request->password);
        $user->dateNUtilis= $request->dateNUtilis;

        $user->save();
        dd($user);
        return ['message' => 'Updated the user info'];
    }

}
