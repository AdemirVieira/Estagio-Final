<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\App;
use App\Student;
use App\Technician;
use App\Teacher;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = user::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->tipo == 'aluno') {
            return redirect()->route('students.create');
        }
        if ($request->tipo == 'professor') {
            return redirect()->route('teachers.create');
        }
        if ($request->tipo == 'tecnico') {
            return redirect()->route('technicians.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {   
        $students = Student::all();
        $teachers = Teacher::all();
        $technicians = Technician::all();
        $user->load('apps');
        $apps = $user->apps;

        if (Auth::check() == false) {
            return redirect('/');
        } else {
            if ($user->id == Auth::user()->id || Auth::user()->admin == 1) {
                foreach($students as $student){
                    if($student->user_id == $user->id){
                        return view('students.show', compact(['student','user','apps']));
                    }
                }
                foreach($teachers as $teacher){
                    if($teacher->user_id == $user->id){
                        return view('teachers.show', compact(['teacher','user','apps']));
                    }
                }
                foreach($technicians as $technician){
                    if($technician->user_id == $user->id){
                        return view('technicians.show', compact(['technician','user','apps']));
                    }
                }
            } else {
                return redirect('/');
            }
        } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        $students = Student::all();
        $teachers = Teacher::all();
        $technicians = Technician::all();

        if (Auth::check() == false) {
            return redirect('/');
        } else {
            if ($user->id == Auth::user()->id || Auth::user()->admin == 1) {
                foreach($students as $student){
                    if($student->user_id == $user->id){
                        return view('students.edit', compact(['student','user']));
                    }
                }
                foreach($teachers as $teacher){
                    if($teacher->user_id == $user->id){
                        return view('teachers.edit', compact(['teacher','user']));
                    }
                }
                foreach($technicians as $technician){
                    if($technician->user_id == $user->id){
                        return view('technicians.edit', compact(['technician','user']));
                    }
                }
            } else {
                return redirect('/');
            }
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        if (isset ($user)) {
            $user->delete();
        }
        return redirect()->route('users.index');
        
    }
}
