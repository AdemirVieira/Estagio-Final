@extends('layout.app')

@section('title','Detalhes da aplicação')

@section('content')
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" 
        aria-describedby="app"  name="name" value="{{ $app->name }}" disabled>

        <label for="description">Descrição</label>
        <input type="text" class="form-control" id="description" 
        aria-describedby="app"  name="description" value="{{ $app->description }}" disabled>
        
    </div>
@endsection