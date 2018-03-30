<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalogo de Perfumes</title>
</head>
<body>

    @extends('layouts.app')
    @section('title', 'Listagem de produto')
    @section('content')
        <h1>Produtos</h1>

        {{Form::open(['url'=>['produtos/buscar']])}}
        <div class="row">
            <div class="col-lg-12">
                <div class="input-group">
                    {{Form::text('busca',$busca,['class'=>'form-control','required', 'placeholder'=>'Buscar'])}}
                    <span class="input-group-btn">
                        {{Form::submit('Buscar',['class'=>'btn btn-info'])}}
                    </span>
                </div>
            </div>
        </div>
        {{Form::close()}}

        @if(Session::has('mensagem'))
        <div class="alert alert-success">{{Session::get('mensagem')}}</div>
        @endif
        <div class="row">
               @foreach ($produtos as $produto)
               <div class="col-md-3">
                   <h4>{{$produto->titulo}}</h4>
                   @if(file_exists("./img/produtos/" . md5($produto->id) . ".jpg"))
                   <a class='thumbnail' href="{{ url('produtos/' .$produto->id) }}">{{Html::image(asset("img/produtos/" . md5($produto->id) . ".jpg"))}}
                </a>
                @else
                <a class='thumbnail' href="{{ url('produtos/'.$produto->id) }}">{{$produto->titulo}}
                </a>
                @endif
                @if(Auth::check())
                {{Form::open(['route'=>['produtos.destroy',$produto->id],
                'method'=>'DELETE'])}}
                <a class='btn btn-success' href=" {{url('produtos/'.$produto->id.'/edit')}}">Editar</a>
                {{Form::submit('Excluir',['class'=>'btn btn-danger'])}}
                {{Form::close()}}
                @endif
               </div>            
            @endforeach
        </div>
        <br>
        {{ $produtos->links() }}
    @endsection
</body>
</html>