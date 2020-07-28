@extends('layout.app')

@section('title','Professores')

@section('content')
<div>
    <a class="btn btn-primary active" style="margin-bottom: 0.5rem;" href="{{ route('teachers.create') }}">    
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
            @foreach ($teachers as $teacher)
                <tr>
                    <th scope="row">{{  $teacher->id }}</th>

                    <td>
                        @foreach($users as $user)
                            @if($user->id == $teacher->user_id)
                                {{ $user->name }}
                            @endif
                        @endforeach
                    </td>

                    <td>
                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
                            onsubmit="return confirm('Realmente deseja apagar este professor?');">
                            @method('DELETE')
                            @csrf


                            <a class="btn btn-sm btn-info active" href="{{route('teachers.edit', $teacher->id)}}">
                                Editar
                            </a>                           

                            <button type="submit" class="btn btn-danger btn-sm">
                                Apagar
                            </button>

                            <a class="btn btn-sm btn-info active" href="{{route('teachers.show', $teacher->id)}}">
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