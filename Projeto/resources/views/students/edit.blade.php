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
        
        <title>Editar</title>
    </head>
    
    <body style="padding-top: 2%">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dados do aluno') }}</div>

                        <div class="card-body">

                            <form method="POST" action="{{ route('students.update', $student->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Nome:</label>
                                    <input type="text" class="form-control" id="name" 
                                    aria-describedby="user"  name="name" value="{{ $user->name }}"
                                    placeholder="Nome completo" required>

                                    <label for="email">E-mail:</label>
                                    <input type="email" class="form-control" id="email" 
                                    aria-describedby="user"  name="email" value="{{ $user->email }}" required>

                                    <label for="password">Senha:</label>
                                    <input type="password" class="form-control" id="password" 
                                    aria-describedby="user"  name="password" required>

                                    <label for="sexo">Sexo:</label><br>
                                    @if ($student->sexo=="Masculino")
                                        <input type="radio" name="sexo" value="Masculino" id="maculino" checked> Masculino <br>
                                        <input type="radio" name="sexo" value="Feminino"  id="feminino">         Feminino  <br>
                                    @else
                                        <input type="radio" name="sexo" value="Masculino" id="maculino">         Masculino <br>
                                        <input type="radio" name="sexo" value="Feminino"  id="feminino" checked> Feminino  <br>
                                    @endif
                                    
                                    <label for="data_nascimento">Data de nascimento:</label>
                                    <input type="date" class="form-control" id="data_nascimento" 
                                    aria-describedby="student"  name="data_nascimento" value="{{ $student->data_nascimento }}" required>

                                    <label for="cpf">CPF:</label>
                                    <input type="text" class="form-control" id="cpf" 
                                    aria-describedby="student"  name="cpf" value="{{ $student->cpf }}" required>

                                    <label for="telefone">Telefone:</label>
                                    <input type="text" class="form-control" id="telefone" 
                                    aria-describedby="student"  name="telefone" value="{{ $student->telefone }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>