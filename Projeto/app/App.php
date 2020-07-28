<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    public function users(){
        return $this->belongsToMany('App\User','app_users');
    }
}
