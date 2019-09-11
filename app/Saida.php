<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    public function produto(){
        return $this->belongsTo('App\Estoque', 'produto_id');
    }
}
