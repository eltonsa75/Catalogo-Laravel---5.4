<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar Produtos</title>
</head>
<body>

        @extends('layouts.app')
        @section('title', 'Alterar o produto:'. $produto->titulo)
        @section('content')

        <h1>Alterar o produto: {{$produto->titulo}}</h1>

        @if(Session::has('mensagem'))
        <div class="alert alert-success">
            {{Session::get('mensagem')}}
        </div>
        @endif

{{Form::open(['route'=>['produtos.update',$produto->id],
'enctype'=>'multipart/form-data','method'=>'PUT'])}}
{{Form::label('referencia', 'Referência',['class'=>'prettyLabels'])}}
{{Form::text('referencia',$produto->referencia,['class'=>'form-control','required','placeholder'=>'Referência'])}}
{{form::label('titulo', 'Titulo')}}
{{Form::text('titulo',$produto->titulo,['class'=>'form-control','required','placeholder'=>'Título'])}}
{{Form::label('descricao', 'Descrição')}}
{{Form::textarea('descricao',$produto->descricao,['row'=>3,'class'=>'form-control','required','placeholder'=>'Descrição'])}}
{{Form::label('preco', 'Preço')}}
{{Form::text('preco',$produto->preco,['class'=>'form-control','required','placeholder'=>'Preço'])}}
{{Form::label('fotoproduto', 'Foto')}}
{{Form::file('fotoproduto',['class'=>'form-control','id'=>'fotoproduto'])}}
<br/>
{{Form::submit('Alterar',['class'=>'btn btn-default'])}}
{{Form::close()}}
@endsection

