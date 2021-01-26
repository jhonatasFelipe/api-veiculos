<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slide extends Model
{
    public $fillable = ['id','imagem','url','ativado', 'data_inicial' ,'data_final'];
    public $timestamps = false;
}
