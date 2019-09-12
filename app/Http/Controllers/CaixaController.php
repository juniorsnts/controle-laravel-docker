<?php

namespace App\Http\Controllers;

use App\Estoque;
use App\Saida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaixaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Estoque::query()->orderBy('created_at')->get();
        $saidas = Saida::query()->orderBy('created_at')->get();
        $total_entrada = intVal(0);
        $total_saida = intVal(0);
        foreach($produtos as $p){
            $total = $p->valor * $p->quantidade;
            $total_entrada += $total;
        }
        foreach($saidas as $s){
            $total_s = $s->produto->valor * $s->quantidade_saida;
            $total_saida += $total_s;
        }
        return view('caixa.index', compact(['produtos', 'total_entrada', 'saidas', 'total_saida']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
