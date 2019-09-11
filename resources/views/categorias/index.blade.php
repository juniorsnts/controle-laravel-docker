@extends('layouts.app')

@section('content')
<div class="container pt-3">
    <div class="card text-center">
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Açoes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $categorias as $c )
                        <tr>
                            <th scope="row">{{ $c->id }}</th>
                            <td>{{ $c->nome }}</td>
                            <td class="d-flex justify-content-center align-items-center">
                                <div class="d-flex flex-row">
                                    <div>
                                        <a href="{{route('home.edit',$c->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    </div>
                                    <form action="{{route('home.destroy',$c->id)}}" method="POST">
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
            {{$categorias->links()}}
        </div>
    </div>  
    <div class="fixed-bottom float-right d-flex justify-content-end m-3">
        <a href="{{route('home.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i>  Cadastrar produto</a>    
    </div>    
</div>
@endsection
