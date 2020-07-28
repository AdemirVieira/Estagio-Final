<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title')</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS -->

  </head>
  
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Início</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">Usuários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('apps.index') }}">Aplicações</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('teachers.index') }}">Professores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('students.index') }}">Alunos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('technicians.index') }}">Técnicos</a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">

    <div class="starter-template">
      @yield('content')
    </div>

    </main><!-- /.container -->
      <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

  </body>
</html>