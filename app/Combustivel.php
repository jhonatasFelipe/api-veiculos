<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Combustivel extends Model
{
    protected $fillable = ['nome'];
    protected $table = 'combustivel';
    protected $hidden = ['updated_at','created_at'];

}
