<?php

namespace App\Http\Controllers;

use App\EmailContato;
use Illuminate\Http\Request;

class EmailContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'email'=>'email'
        ]);
            $email = EmailContato::select('*');
        if($request->has('email')){
            $email->where('email',$request->email);
        }
        return $email->get();
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
            'email'=>"required|email"
        ]);

        return EmailContato::create($request->all());
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\emailContato  $emailContato
     * @return \Illuminate\Http\Response
     */
    public function show(EmailContato $email_contato)
    {
        return $email_contato;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\emailContato  $emailContato
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailContato $email_contato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\emailContato  $emailContato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmailContato $email_contato)
    {
        $request->validate([
            'email'=>"email"
        ]);

        $email_contato->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\emailContato  $emailContato
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailContato $email_contato)
    {
        if($email_contato->delete()){
            return true;
        }
        return false;
    }
}
