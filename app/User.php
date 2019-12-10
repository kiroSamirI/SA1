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
        'name', 'email', 'password',
    ];

    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function is_super_admin(){
        if($this->user_type == 'SuperAdmin'){
            return true;
        }
        return false;
    }
    public function is_admin(){
        if($this->user_type == 'admin'){
            return true;
        }
        return false;
    }
    public function is_employee(){
        if($this->user_type == 'employee'){
            return true;
        }
        return false;
    }
    public function is_teacher(){
        if($this->user_type == 'teacher'){
            return true;
        }
        return false;
    }
    public function is_user(){
        if($this->user_type == 'user'){
            return true;
        }
        return false;
    }
    public function subject(){
        return $this->hasMany('App\subject');
    }

    public function subject_user(){
        return $this->belongsToMany('App\subject');
    }
}
