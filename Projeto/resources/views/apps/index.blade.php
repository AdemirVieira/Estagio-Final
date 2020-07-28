@extends('layout.app')

@section('title','Aplicações')

@section('content')
<div>
    <a class="btn btn-primary active" style="margin-bottom: 0.5rem;" href="{{ route('apps.create') }}">    
        Adicionar
    </a>
</div>

<div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">OPÇÕES</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($apps as $app)
                <tr>
                    <th scope="row">{{  $app->id }}</th>
                    <td>{{  $app->name }}</td>
                    <td>
                        <form action="{{ route('apps.destroy', $app->id) }}" method="POST"
                            onsubmit="return confirm('Realmente deseja apagar esta aplicação?');">
                            @method('DELETE')
                            @csrf


                            <a class="btn btn-sm btn-info active" href="{{route('apps.edit', $app->id)}}">
                                Editar
                            </a>                           

                            <button type="submit" class="btn btn-danger btn-sm">
                                Apagar
                            </button>

                            <a class="btn btn-sm btn-info active" href="{{route('apps.show', $app->id)}}">
                                Detalhes
                            </a> 

                        </form>
                    </td>
                </tr>
            @endforeach
            
            
            </tbody>
        </table>
</div>




@endsection