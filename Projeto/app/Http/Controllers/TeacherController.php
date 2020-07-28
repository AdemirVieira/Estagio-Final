<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Teacher;
use App\User;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = teacher::all();
        $users = user::all();
        return view('teachers.index',compact(['teachers','users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = user::all();
        return view('teachers.create', compact(['users']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $t = new teacher();
        $u = new user();
        $u->name = $request->name;
        $u->email = $request->email;
        $u->password = Hash::make($request->password);
        $t->sexo = $request->sexo;
        $t->data_nascimento = $request->data_nascimento;
        $t->cpf = $request->cpf;
        $t->telefone = $request->telefone;
        $u->save();
        $t->user_id = $u->id;
        $t->save();
        
        return redirect()->route('teachers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(teacher $teacher)
    {   
        $user = user::find($teacher->user_id);
        $user->load('apps');
        $apps = $user->apps;
        return view('teachers.show', compact(['teacher','user','apps']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(teacher $teacher)
    {
        $user = user::find($teacher->user_id);
        if (isset($teacher)) {
            return view('teachers.edit', compact(['teacher','user']));
        }
        return redirect()->route('teachers.index');
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
        $teacher = teacher::find($id);
        $u = user::find($teacher->user_id);
        if (isset ($teacher)) {
            $u->name = $request->name;
            $u->email = $request->email;
            $u->password = Hash::make($request->password);
            $teacher->sexo = $request->sexo;
            $teacher->data_nascimento = $request->data_nascimento;
            $teacher->cpf = $request->cpf;
            $teacher->telefone = $request->telefone;
            $u->save();
            $teacher->save();
        }
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(teacher $teacher)
    {
        $u = user::find($teacher->user_id);
        if (isset ($teacher)) {
            $u->delete();
        }
        return redirect()->route('teachers.index');
        
    }
}