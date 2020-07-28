@extends('layout.app')

@section('title','Nova aplicação')

@section('content')
<form method="POST" action="{{ route('apps.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" 
        aria-describedby="app"  name="name"
        placeholder="Nome da aplicação">

        <label for="description">Descrição</label>
        <input type="text" class="form-control" id="description" 
        aria-describedby="app"  name="description"
        placeholder="Breve descrição">
    
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection