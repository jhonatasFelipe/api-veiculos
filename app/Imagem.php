<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = 'imagem';
    protected $fillable = ['path', 'capa','veiculo'];
    protected $hidden = ['updated_at','created_at'];

    public function veiculos(){
        return $this->hasOne(Veiculo::Class ,'veiculo' ,'id');
    }
}


