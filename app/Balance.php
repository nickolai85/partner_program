<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
   protected $fillable = [
        'amount'
    ];

    public function users_balance(){

        return $this->hasMany('App\User_balance');
    }
}
