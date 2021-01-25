<?php

namespace App\Http\Controllers;

use App\Combustivel;
use Illuminate\Http\Request;

class CombustivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Combustivel::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
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
            'nome'=>"required"
        ]);
       return Combustivel::create($request->all()); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Combustivel  $combustivel
     * @return \Illuminate\Http\Response
     */
    public function show(Combustivel $combustivel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Combustivel  $combustivel
     * @return \Illuminate\Http\Response
     */
    public function edit(Combustivel $combustivel)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Combustivel  $combustivel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Combustivel $combustivel)
    {
        $request->validate([
            'nome'=>"required"
        ]);
        
       return  $combustivel->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Combustivel  $combustivel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Combustivel $combustivel)
    {
        $combustivel->delete();
    }
}
