@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center pt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-center m-0 p-1">Cadastro de produtos</h4>
        </div>
        <form class="bg-white p-5 border shadow" action="{{route('categoria.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nome da categoria</label>
                <input onkeyup="this.value = this.value.toUpperCase()" class="form-control" name="nome" placeholder="Nome">
            </div>
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a class="ml-3 btn btn-danger text-white" href="{{route('home.index')}}">Voltar</a>
        </form>
    </div>
</div>
@endsection