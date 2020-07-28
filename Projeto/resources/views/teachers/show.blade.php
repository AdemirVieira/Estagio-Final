<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <title>Detalhes</title>
    </head>
    
    <body style="padding-top: 2%">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dados do professor') }}</div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" id="name" 
                                aria-describedby="user"  name="name" value="{{ $user->name }}" disabled>

                                <label for="email">E-mail:</label>
                                <input type="email" class="form-control" id="email" 
                                aria-describedby="user"  name="email" value="{{ $user->email }}" disabled>

                                <label for="sexo">Sexo:</label><br>
                                @if ($teacher->sexo=="Masculino")
                                    <input type="radio" name="sexo" value="Masculino" id="maculino" checked disabled> Masculino <br>
                                    <input type="radio" name="sexo" value="Feminino"  id="feminino" disabled>         Feminino  <br>
                                @else
                                    <input type="radio" name="sexo" value="Masculino" id="maculino" disabled>         Masculino <br>
                                    <input type="radio" name="sexo" value="Feminino"  id="feminino" checked disabled> Feminino  <br>
                                @endif
                                
                                <label for="data_nascimento">Data de nascimento:</label>
                                <input type="date" class="form-control" id="data_nascimento" 
                                aria-describedby="teacher"  name="data_nascimento" value="{{ $teacher->data_nascimento }}" disabled>

                                <label for="cpf">CPF:</label>
                                <input type="text" class="form-control" id="cpf" 
                                aria-describedby="teacher"  name="cpf" value="{{ $teacher->cpf }}" disabled>

                                <label for="telefone">Telefone:</label>
                                <input type="text" class="form-control" id="telefone" 
                                aria-describedby="teacher"  name="telefone" value="{{ $teacher->telefone }}" disabled>

                                <label for="Aplicações">Aplicações:</label>
                                @forelse ($apps as $app)
                                    <input type="text" class="form-control" style="margin-bottom: 0.5em" id="aplicacoes" aria-describedby="apps"  name="aplicacoes" disabled value="{{ $app->name }}">
                                @empty
                                    <input type="text" class="form-control" style="margin-bottom: 0.5em" id="aplicacoes" aria-describedby="apps"  name="aplicacoes" disabled value="Nenhuma">
                                @endforelse

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>