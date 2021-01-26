<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailContato extends Model
{
    public $fillable = ['id','email'];
    public $table = 'contact_emails';
    public $timestamps = false;
}
