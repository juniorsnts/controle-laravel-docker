@extends('layouts.app')

@section('content')
<div class="container pt-3">
    <div class="card text-center">
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Estoque</th>
                        <th scope="col text-danger">Data de validade</th>
                        <th scope="col">Total</th>
                        <th scope="col">Açoes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $produtos_vencidos as $p )
                        <tr>
                            <th scope="row">{{ $p->id }}</th>
                            <td>{{ $p->nome_produto }}</td>
                            <td>{{ $p->categoria->nome }}</td>
                            <td>R$ {{ $p->valor }}</td>
                            <td>{{ $p->quantidade }}</td>
                            <td>{{ $p->data_validade }}</td>
                            <td>R$ {{ floatVal($p->totalValor(floatVal($p->valor), $p->quantidade)) }}</td>
                            <td class="d-flex justify-content-center align-items-center">
                                <div class="d-flex flex-row">
                                    <div>
                                        <a href="{{route('home.edit',$p->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    </div>
                                    <form action="{{route('home.destroy',$p->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>                                    
                                    </form>
                                </div>
                            </td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        </button>
        <div class="card-footer">
            {{$produtos->links()}}
        </div>
    </div>  
    <div class="fixed-bottom float-right d-flex justify-content-end m-3">
        <a href="{{route('categoria.create')}}" class="btn btn-primary mr-3"><i class="fa fa-plus-circle"></i>  Cadastrar categoria</a>    
        <a href="{{route('home.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i>  Cadastrar produto</a>    
    </div>    
</div>
@endsection
