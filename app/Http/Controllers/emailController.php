<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Interresse;
use Illuminate\Support\Facades\Mail;

class emailController extends Controller
{
    public function enviaInterese(Request $request){
        $cliente = $request->nome;
        $email = $request->email;
        $telefone = $request->telefone;
        $veiculo = $request->veiculo;

        $mail =  new Interresse($veiculo, $cliente, $email ,$telefone);
        Mail::to('jhonatas1020@gmail.com')->send($mail);
    }
}
