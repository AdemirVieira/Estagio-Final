@extends('layout.app')

@section('title','Alunos')

@section('content')
<div>
    <a class="btn btn-primary active" style="margin-bottom: 0.5rem;" href="{{ route('students.create') }}">    
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
            @foreach ($students as $student)
                <tr>
                    <th scope="row">{{  $student->id }}</th>

                    <td>
                        @foreach($users as $user)
                            @if($user->id == $student->user_id)
                                {{ $user->name }}
                            @endif
                        @endforeach
                    </td>

                    <td>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                            onsubmit="return confirm('Realmente deseja apagar este aluno?');">
                            @method('DELETE')
                            @csrf


                            <a class="btn btn-sm btn-info active" href="{{route('students.edit', $student->id)}}">
                                Editar
                            </a>                           

                            <button type="submit" class="btn btn-danger btn-sm">
                                Apagar
                            </button>

                            <a class="btn btn-sm btn-info active" href="{{route('students.show', $student->id)}}">
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