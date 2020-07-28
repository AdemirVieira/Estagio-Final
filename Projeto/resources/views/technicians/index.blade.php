@extends('layout.app')

@section('title','Técnicos')

@section('content')
<div>
    <a class="btn btn-primary active" style="margin-bottom: 0.5rem;" href="{{ route('technicians.create') }}">    
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
            @foreach ($technicians as $technician)
                <tr>
                    <th scope="row">{{  $technician->id }}</th>

                    <td>
                        @foreach($users as $user)
                            @if($user->id == $technician->user_id)
                                {{ $user->name }}
                            @endif
                        @endforeach
                    </td>

                    <td>
                        <form action="{{ route('technicians.destroy', $technician->id) }}" method="POST"
                            onsubmit="return confirm('Realmente deseja apagar este aluno?');">
                            @method('DELETE')
                            @csrf


                            <a class="btn btn-sm btn-info active" href="{{route('technicians.edit', $technician->id)}}">
                                Editar
                            </a>                           

                            <button type="submit" class="btn btn-danger btn-sm">
                                Apagar
                            </button>

                            <a class="btn btn-sm btn-info active" href="{{route('technicians.show', $technician->id)}}">
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