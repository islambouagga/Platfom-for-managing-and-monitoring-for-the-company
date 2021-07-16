<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ChargePrj;
use Illuminate\Http\Request;

class ChargePrjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chargePrj =  ChargePrj::with('users')->get();
        return $chargePrj;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChargePrj  $chargePrj
     * @return \Illuminate\Http\Response
     */
    public function show(ChargePrj $chargePrj)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChargePrj  $chargePrj
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChargePrj $chargePrj)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChargePrj  $chargePrj
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChargePrj $chargePrj)
    {
        //
    }
}
