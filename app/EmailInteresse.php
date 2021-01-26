<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailInteresse extends Model
{
    public $fillable = ['id','email'];
    public $timestamps = false;
    public $table="interesse_emails";
}
