<?php

namespace App;
use App\Marca;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = 'modelo';
    protected $fillable = ['nome','marca'];
    protected $hidden = ['updated_at', 'created_at'];

    public function marca(){
        return $this->belongsTo( Marca::class ,'marca', 'id');
    }

    
}
