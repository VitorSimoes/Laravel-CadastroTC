<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $table = 'projeto';
    protected $fillable = ['filename','user_id','created_at','updated_at'];

    public function produtos(){

        return $this->hasMany(Produto::class);
    }
}
