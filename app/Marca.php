<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table='marca';
    protected $fillable=['nome'];
    protected $hidden = ['updated_at','created_at'];


    public function modelos(){
        return hasMany(Modelo::class, 'marca','id');
    }

}
