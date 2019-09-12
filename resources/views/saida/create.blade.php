@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center pt-5">
        <div class="card w-50">
            <div class="card-header">
                <h4 class="card-title text-center m-0 p-1">Cadastro de produtos</h4>
            </div>
            <form class="bg-white p-5 border shadow" action="{{route('saida.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">Selecione o produto</label>
                    <select class="form-control" name="produto_id">
                        @foreach ($produtos as $p)
                        <option value="{{$p->id}}">{{$p->nome_produto}}</option>                        
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-5 p-0">
                    <label>Quantidade da saida</label>
                    <input type="number" name="quantidade_saida" class="form-control" placeholder="Quantidade">
                </div>
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a class="ml-3 btn btn-danger text-white" href="{{route('home.index')}}">Voltar</a>
            </form>
        </div>
    </div>
@endsection