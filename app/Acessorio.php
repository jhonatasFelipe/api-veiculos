<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acessorio extends Model
{
    protected $fillable = ['nome'];
    protected $table = 'acessorio';
    protected $hidden = ['updated_at','created_at'];


    public function veiculos(){
        return $this->belongsToMany('acessorios_as_veiculo','acessorio','id_acessorio','id_veiculo');
    }
}
