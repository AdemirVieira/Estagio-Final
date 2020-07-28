@extends('layout.app')

@section('title','Atribuição de aplicação')

@section('content')

@php
$apps_ids = array_map( 
    function($app) {
        return $app['id'];
    }, $appsuser->toArray());
@endphp



        <h5>Usuário: {{ $user->name }}</h5>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">APLICAÇÕES</th>
                    <th scope="col">DESCRIÇÃO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apps as $a)
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$a->id}}" 
                                    @if(in_array($a->id, $apps_ids)) checked @endif
                                    name="apps[]" id="input_{{$a->id}}" form="form_apps" >
                                <label class="form-check-label" for="input_{{$a->id}}">
                                    {{$a->name}}
                                </label>
                            </div>

                        </td>
                        <td>{{ $a->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <form action="{{ route('apps.assign', $user->id) }}" method="POST" id="form_apps" >
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-primary">
                Salvar
            </button>
        </form>        
    
@endsection