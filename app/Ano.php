<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ano extends Model
{
    protected $table = 'ano';
    protected $fillable = ['ano'];
    protected $hidden = ['updated_at','created_at'];
}
