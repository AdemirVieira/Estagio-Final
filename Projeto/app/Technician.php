<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    protected $fillable = [
        'sexo', 'data_nascimento', 'cpf', 'telefone', 'user_id'
    ];
    
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
