@extends('layout.app')

@section('title','Novo técnico')

@section('content')

<script type="text/javascript">
    function formatar_mascara(src, mascara) {
        var campo = src.value.length;
        var saida = mascara.substring(0,1);
        var texto = mascara.substring(campo);
        if(texto.substring(0,1) != saida)
            src.value += texto.substring(0,1);
    }
</script>

<form method="POST" action="{{ route('technicians.store') }}">
    @csrf
    <div class="form-group">

        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" 
        aria-describedby="user"  name="name"
        placeholder="Nome completo" required>

        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" 
        aria-describedby="user"  name="email" required>

        <label for="password">Senha</label>
        <input type="password" class="form-control" id="password" 
        aria-describedby="user"  name="password" required>

        <label for="sexo">Sexo</label><br>
        <input type="radio" name="sexo" value="Masculino" checked> Masculino <br>
        <input type="radio" name="sexo" value="Feminino" > Feminino  <br>

        <label for="data_nascimento">Data de Nascimento</label>
        <input type="date" class="form-control" id="data_nascimento" 
        aria-describedby="technician"  name="data_nascimento" required>

        <label for="cpf">CPF</label>
        <input type="text" class="form-control" id="cpf" 
        aria-describedby="technician"  name="cpf" onkeypress="formatar_mascara(this,'###.###.###-##')" required>

        <label for="telefone">Telefone</label>
        <input type="text" class="form-control" id="telefone" 
        aria-describedby="technician"  name="telefone" required>

    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection