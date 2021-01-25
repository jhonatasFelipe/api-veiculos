<?php

namespace App\Mail;

use App\Veiculo;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Interresse extends Mailable
{
    use Queueable, SerializesModels;

    public $cliente;
    public $email;
    public $telefone;
    public $veiculo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($veiculo ,$cliente,$email,$telefone)
    {
        $this->cliente = $cliente;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->veiculo = Veiculo::with('imagens','acessorios')
            ->with('imagens','acessorios')
            ->select('veiculo.id',
                'marca.nome as marca',
                'modelo.nome as modelo',
                'ano.ano',
                'combustivel.nome as combustivel',
                'motor.potencia as motor',
                'veiculo.portas',
                'veiculo.ativado',
                'veiculo.preco',
                'veiculo.obs',
            )
            ->join('ano', 'veiculo.ano','=','ano.id')
            ->join('marca', 'veiculo.marca','=','marca.id')
            ->join('modelo', 'veiculo.modelo','=','modelo.id')
            ->join('motor', 'veiculo.motor','=','motor.id')
            ->join('combustivel', 'veiculo.combustivel','=','combustivel.id')
            ->where('veiculo.id','=',$veiculo)
            ->get()->toArray();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.interesse');
    }
}
