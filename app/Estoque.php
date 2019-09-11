<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }

    public function totalValor($valor, $quantidade){
        $total = floatVal($valor) * $quantidade;
        return floatVal($total);
    }
}
