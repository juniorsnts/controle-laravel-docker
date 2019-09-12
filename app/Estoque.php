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

    public function isVencido($data_validade){
        $isValid = \Carbon\Carbon::now();
        if($isValid > $data_validade){
            return 'Vencido a '.\Carbon\Carbon::now()->diffInDays($data_validade).' dias';
        } else if($isValid < $data_validade){
            if(\Carbon\Carbon::now()->diffInDays($data_validade) <= 2){
                return 'Falta apenas '.\Carbon\Carbon::parse($data_validade)->diffInDays().' dias';;
            }
        }
    }

    public function total($valor, $quantidade){
        $total = $valor * $quantidade;
        $total_geral = $total;
        $total_geral += $total;
        return $total_geral;
    }
}
