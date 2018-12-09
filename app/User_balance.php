<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_balance extends Model
{
    protected $fillable = [
        'id','balance_id', 'user_id', 'partner_id', 'amount'
    ];
}
