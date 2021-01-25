<?php

namespace App\Http\Controllers;
use App\Motor;

use Illuminate\Http\Request;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motor = new Motor();
        return $motor->orderBy('potencia','asc')->get();
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
            'potencia'=>'required'
        ]);

        return Motor::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Motor $motor
     * @return \Illuminate\Http\Response
     */
    public function show( Motor $motor)
    {
        return $motor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Motor $motor)
    {
        $request->validate([
            'potencia'=>'required'
        ]);

       return $motor->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motor $motor)
    {
        $motor->delete();
    }
}
