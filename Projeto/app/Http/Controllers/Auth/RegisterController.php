<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Student;
use App\Teacher;
use App\Technician;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cpf' => ['required', 'string', 'max:11'],
            'telefone' => ['required', 'string', 'max:11'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if ($data['tipo'] == 'aluno') {

            $u = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            Student::create([
                'sexo' => $data['sexo'],
                'data_nascimento' => $data['data_nascimento'],
                'cpf' => $data['cpf'],
                'telefone' => $data['telefone'],
                'user_id' => $u->id,
                
            ]);
            
            return $u;
        }
        if ($data['tipo'] == 'professor') {

            $u = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            Teacher::create([
                'sexo' => $data['sexo'],
                'data_nascimento' => $data['data_nascimento'],
                'cpf' => $data['cpf'],
                'telefone' => $data['telefone'],
                'user_id' => $u->id,
                
            ]);
            
            return $u;
        }
        if ($data['tipo'] == 'tecnico') {
            

            $u = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            Technician::create([
                'sexo' => $data['sexo'],
                'data_nascimento' => $data['data_nascimento'],
                'cpf' => $data['cpf'],
                'telefone' => $data['telefone'],
                'user_id' => $u->id,
                
            ]);
            
            return $u;
        }
    }
}
