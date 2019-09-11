<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Estoque;
use App\Categoria;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $produtos = Estoque::paginate(10);
        return view('produtos.home', compact(['produtos']));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact(['categorias']));
    }

    public function store(Request $request)
    {
        $produto = new Estoque;
        $produto->nome_produto = $request->nome_produto;
        $produto->categoria_id = $request->categoria_id;
        $produto->valor = $request->valor;
        $produto->quantidade = $request->quantidade;
        $produto->data_validade = $request->data_validade;
        $produto->save();
        return redirect('/');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $produto = Estoque::find($id);
        $categorias = Categoria::all();
        return view('produtos.edit',compact(['produto', 'categorias']));
    }

    public function update(Request $request, $id)
    {
        $produto = Estoque::find($id);
        $produto->nome_produto = $request->nome_produto;
        $produto->categoria_id = $request->categoria_id;
        $produto->valor = $request->valor;
        $produto->quantidade = $request->quantidade;
        $produto->data_validade = $request->data_validade;
        $produto->save();
        return redirect('/');
    }

    public function destroy($id)
    {
        $produto = Estoque::find($id);
        $produto->delete();
        return redirect('/');
    }
}
