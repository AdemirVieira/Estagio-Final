<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Technician;
use App\User;

class TechnicianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technicians = technician::all();
        $users = user::all();
        return view('technicians.index',compact(['technicians','users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = user::all();
        return view('technicians.create', compact(['users']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $t = new technician();
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
        
        return redirect()->route('technicians.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(technician $technician)
    {   
        $user = user::find($technician->user_id);
        $user->load('apps');
        $apps = $user->apps;
        return view('technicians.show', compact(['technician','user','apps']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(technician $technician)
    {
        $user = user::find($technician->user_id);
        if (isset($technician)) {
            return view('technicians.edit', compact(['technician','user']));
        }
        return redirect()->route('technicians.index');
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
        $technician = technician::find($id);
        $u = user::find($technician->user_id);
        if (isset ($technician)) {
            $u->name = $request->name;
            $u->email = $request->email;
            $u->password = Hash::make($request->password);
            $technician->sexo = $request->sexo;
            $technician->data_nascimento = $request->data_nascimento;
            $technician->cpf = $request->cpf;
            $technician->telefone = $request->telefone;
            $u->save();
            $technician->save();
        }
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(technician $technician)
    {
        $u = user::find($technician->user_id);
        if (isset ($technician)) {
            $u->delete();
        }
        return redirect()->route('technicians.index');
        
    }
}
