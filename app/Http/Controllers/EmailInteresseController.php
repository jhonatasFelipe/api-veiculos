<?php

namespace App\Http\Controllers;

use App\EmailInteresse;
use Illuminate\Http\Request;

class EmailInteresseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'email'=> 'email'
        ]);
            $email = EmailInteresse::select('*');
        if($request->has('email')){
            $email->where('email',$request->email);
        }
        return $email->get();
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

        return EmailInteresse::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\emailInteresse  $email_interesse
     * @return \Illuminate\Http\Response
     */
    public function show(EmailInteresse $email_interesse)
    {
        return $email_interesse;
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\emailInteresse  $email_interesse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmailInteresse $email_interesse)
    {
        $request->validate([
            'email'=>"email"
        ]);

        $email_interesse->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\emailInteresse  $email_interesse
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailInteresse $email_interesse)
    {
        if($email_interesse->delete()){
            return true;
        }
        return false;
    }
}
