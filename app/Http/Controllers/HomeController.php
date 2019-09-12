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
        $data_atual = \Carbon\Carbon::now();
        $produtos = Estoque::query()->orderBy('created_at', 'desc')->paginate(10);
        $produtos_vencidos = Estoque::where('data_validade', '<=', $data_atual)->count('id');
        $produtos_perto_venc = Estoque::where('data_validade', '=', '2019-09-28')->count('id');
        return view('produtos.home', compact(['produtos', 'produtos_vencidos', 'produtos_perto_venc']));
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

    public function vencidos()
    {
        $data_atual = \Carbon\Carbon::now();    
        $produtos_vencidos = Estoque::where('data_validade', '<=', $data_atual)->paginate(10);
        return view('produtos.vencidos', compact(['produtos_vencidos']));
    }
    public function generatePDF()
    {
        $produtos = Estoque::all();
        return \PDF::loadView('produtos.relatorio', compact('produtos'))->setPaper('a4', 'landscape')->download('relatorio.pdf');
    }
}
