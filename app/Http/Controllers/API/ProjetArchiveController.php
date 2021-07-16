<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProjetArchive;
use Illuminate\Http\Request;

class ProjetArchiveController extends Controller
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
        $projets =ProjetArchive::with('fichesArchives')->get();
        return($projets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\ProjetArchive  $projetArchive
     * @return \Illuminate\Http\Response
     */
    public function show(ProjetArchive $projetArchive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjetArchive  $projetArchive
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjetArchive $projetArchive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjetArchive  $projetArchive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjetArchive $projetArchive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjetArchive  $projetArchive
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjetArchive $projetArchive)
    {
        //
    }
}
