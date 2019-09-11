@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center pt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-center m-0 p-1">Cadastro de produtos</h4>
        </div>
        <form class="bg-white p-5 border shadow" action="{{route('home.update', $produto->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nome do produto</label>
                <input value='{{$produto->nome_produto}}' class="form-control" name="nome_produto" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Categoria</label>
                <select class="form-control" name="categoria_id">
                    @foreach ($categorias as $c)
                    <option selected="{{$produto->categoria_id}}" value="{{$c->id}}">{{$c->nome}}</option>                        
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <div class="form-group col-sm-5 p-0">
                    <label>Valor</label>
                    <input value="{{$produto->valor}}" name="valor" class="form-control" placeholder="Valor">
                </div>
                <div class="form-group col-sm-5 p-0">
                    <label>Quantidade</label>
                    <input value="{{$produto->quantidade}}" type="number" name="quantidade" class="form-control" placeholder="Quantidade">
                </div>
            </div>
            <div class="form-group col-sm-5 p-0">
                <label>Data de validade</label>
                <input value="{{$produto->data_validade}}" name="data_validade" type="date" class="form-control" placeholder="Data de validade">
            </div>
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a class="ml-3 btn btn-danger text-white" href="{{route('home.index')}}">Voltar</a>
        </form>
    </div>
</div>
@endsection