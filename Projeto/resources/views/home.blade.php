@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Notificação</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->admin == 1)
                        <div class="alert alert-success"><p>Olá {{ Auth::user()->name }}, você foi possui permissões de <strong>ADMINISTRADOR</strong>.</p></div>
                        
                    @else
                        <div class="alert alert-info"><p>Olá {{ Auth::user()->name }}, fique a vontade para editar ou verificar seus dados através das opções abaixo.</p></div>
                        <a class="btn btn-sm btn-info active" href="{{route('users.show', Auth::user()->id)}}">
                            Detalhes
                        </a> 
                        
                        <a class="btn btn-sm btn-info active" style="margin-left: 1%" href="{{route('users.edit', Auth::user()->id)}}">
                            Editar
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
