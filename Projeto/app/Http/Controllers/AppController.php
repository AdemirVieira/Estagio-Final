<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\App;
use App\User;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps = app::all();
        return view('apps.index',compact('apps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = user::all();
        return view('apps.create', compact(['users']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $m = new app();
        $m->name = $request->name;
        $m->description = $request->description;
        $m->users()->attach($request->users);
        $m->save();

        return redirect()->route('apps.index');
    
        $p->departamentos()->attach($request->departamentos);
        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(App $app)
    {
        return view('apps.show', compact(['app']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(app $app)
    {
        if (isset($app)) {
            return view('apps.edit', compact(['app']));
        }
        return redirect()->route('apps.index');
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
        $app = app::find($id);
        if (isset ($app)) {
            $app->name = $request->name;
            $app->description = $request->description;
            $app->save();
        }
        return redirect()->route('apps.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(app $app)
    {
        if (isset ($app)) {
            $app->delete();
        }
        return redirect()->route('apps.index');
        
    }

    /* Selecionar aplicações */
    public function select(User $user)
    {
        $apps = app::all();
        $user->load('apps');
        $appsuser = $user->apps;
        //dd($user);
        //dd($apps,$user, $appsuser);
        return view('apps.assign', compact(['user','apps','appsuser']));
    }

    /* Atribuir aplicações aos usuários */
    public function assign(Request $request, User $user)
    {
        $user->apps()->sync($request->apps);
        return redirect()->route('users.index');
    }
}
