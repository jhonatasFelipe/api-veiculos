<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $table = 'motor';
    protected $fillable=['potencia'];
    protected $hidden = ['updated_at','created_at'];
}
