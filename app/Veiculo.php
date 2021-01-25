<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $table = 'veiculo';
    protected $fillable=['marca', 'motor', 'modelo' , 'ano' , 'portas' ,'acessorios','imagens', 'combustivel','ativado','preco','obs'];
    protected $hidden = ['created_at','updated_at'];

    public function  marca(){
        return $this->belongsTo('App\Marca' ,'marca' , 'id');
    }

    public function modelo(){
        return $this->belongsTo('App\Modelo','modelo' ,'id');
    }

    public function ano(){
        return $this->belongsTo('App\Ano' , 'ano' ,'id');
    }

    public function motor(){
        return $this->belongsTo(Motor::Class ,'motor' ,'id');
    }

    public function combustivel(){
        return $this->belongsTo(Combustivel::Class ,'combustivel' ,'id');
    }

    public function imagens(){
        return $this->hasMany(Imagem::class, 'veiculo' ,'id');
    }

    public function acessorios(){
        return $this->belongsToMany(Acessorio::class,'acessorios_as_veiculo','id_Veiculo','id_acessorio');
    }

    public static function joinVeiculo(){
        return self::with('imagens','acessorios')
         ->with('imagens','acessorios')
         ->select(
             'veiculo.id',
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
         ->join('combustivel', 'veiculo.combustivel','=','combustivel.id');
 
     }
}
