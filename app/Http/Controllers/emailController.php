<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Interresse;
use Illuminate\Support\Facades\Mail;
use App\EmailInteresse;

class emailController extends Controller
{
    public function enviaInterese(Request $request){
        $cliente = $request->nome;
        $email = $request->email;
        $telefone = $request->telefone;
        $veiculo = $request->veiculo;

         
        $destinatarios = EmailInteresse::select('email');
        
        foreach($destinatarios->get() as $destinatario){
            Mail::to($destinatario->mail)->send(new Interresse($veiculo, $cliente, $email ,$telefone));
        }
    }
}
