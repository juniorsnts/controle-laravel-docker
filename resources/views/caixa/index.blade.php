@extends('layouts.app')

@section('content')
<div class="d-flex flex-row justify-content-between p-3">
    <div class="card w-50 bg-success text-white m-1">
        <div class="card-header">
            <h4 class="text-center">Entrada de produtos</h4>
        </div>
        <div class="card-body m-0 p-0">
        <table class="table table-striped text-white">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $produtos as $p )
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->nome_produto }}</td>
                        <td>{{ $p->categoria->nome }}</td>
                        <td>R$ {{ $p->valor }}</td>
                        <td>{{ $p->quantidade }}</td>
                        <td>R$ {{ floatVal($p->totalValor(floatVal($p->valor), $p->quantidade)) }}</td>
                    </tr>                        
                @endforeach
            </tbody>
        </table>
        </div>
        <div class="card-footer">            
            <h4 class="p-1 m-0">TOTAL: R$ {{number_format($total, 2, ',', ' ')}}</h4>
        </div>
    </div>
    <div class="card w-50 bg-danger text-white m-1">
        <div class="card-header">
            <h4 class="text-center">Saida de produtos</h4>
        </div>
        <div class="card-body p-0">
        <table class="table table-striped text-white">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Estoque saida</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $saidas as $s )
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->produto->nome_produto }}</td>
                        <td>{{ $s->produto->categoria->nome }}</td>
                        <td>R$ {{ $s->produto->valor }}</td>
                        <td class="text-center">{{ $s->quantidade_saida }}</td>
                        <td>R$ {{ floatVal($s->produto->totalValor(floatVal($s->produto->valor), $s->quantidade_saida)) }}</td>
                    </tr>                        
                @endforeach
            </tbody>
        </table>
        </div>
        <div class="card-footer">
            <h4 class="p-1 m-0">TOTAL: R$ {{number_format($total_saida, 2, ',', ' ')}}</h4>
        </div>
    </div>
    <div class="fixed-bottom float-right d-flex justify-content-end m-3">
        <a href="{{route('saida.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i>  Nova saida</a>    
    </div>    
</div>
@endsection