<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Student;
use App\User;
use App\App;
Use App\AppUsers;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = student::all();
        $users = user::all();
        return view('students.index',compact(['students','users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = user::all();
        return view('students.create', compact(['users']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $s = new student();
        $u = new user();
        $u->name = $request->name;
        $u->email = $request->email;
        $u->password = Hash::make($request->password);
        $s->sexo = $request->sexo;
        $s->data_nascimento = $request->data_nascimento;
        $s->cpf = $request->cpf;
        $s->telefone = $request->telefone;
        $u->save();
        $s->user_id = $u->id;
        $s->save();
        
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {   
        $user = User::find($student->user_id);
        $user->load('apps');
        $apps = $user->apps;
        //dd($apps);
        return view('students.show', compact(['student','user','apps']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        $user = user::find($student->user_id);
        if (isset($student)) {
            return view('students.edit', compact(['student','user']));
        }
        return redirect()->route('students.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = student::find($id);
        $u = user::find($student->user_id);
        if (isset ($student)) {
            $u->name = $request->name;
            $u->email = $request->email;
            $u->password = Hash::make($request->password);
            $student->sexo = $request->sexo;
            $student->data_nascimento = $request->data_nascimento;
            $student->cpf = $request->cpf;
            $student->telefone = $request->telefone;
            $u->save();
            $student->save();
        }
        return redirect()->route('home');
        /*return redirect()->route('students.index');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        $u = user::find($student->user_id);
        if (isset ($student)) {
            $u->delete();
        }
        return redirect()->route('students.index');
        
    }
}
