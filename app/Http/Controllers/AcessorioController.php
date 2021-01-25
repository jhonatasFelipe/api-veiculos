<?php

namespace App\Http\Controllers;

use App\Acessorio;
use Illuminate\Http\Request;

class AcessorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Acessorio::all();
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
        $request->validate([
            'nome'=>'required|string'
        ]);

        return Acessorio::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Acessorio  $acessorio
     * @return \Illuminate\Http\Response
     */
    public function show(Acessorio $acessorio)
    {
        return $acessorio;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Acessorio  $acessorio
     * @return \Illuminate\Http\Response
     */
    public function edit(Acessorio $acessorio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Acessorio  $acessorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acessorio $acessorio)
    {
        $request->validate([
            'nome'=>'required|string'
        ]);

        $acessorio->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Acessorio  $acessorio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acessorio $acessorio)
    {
        $acessorio->delete();
    }
}
