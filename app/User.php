<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'partner_id','name', 'email', 'password','level_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function level()
    {
        return $this->belongsTo('App\Level');
    }
    public function referal(){
        return $this->hasMany(self::class, 'user_id');
    }
    public function partner(){
        return $this->belongsTo(self::class, 'user_id');
    }
    public function balance(){
        return $this->hasMany(User_balance::class, 'user_id');
    }
    public function from_referal(){
        return $this->hasMany(User_balance::class, 'referal_id');
    }


}
