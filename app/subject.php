<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function user_student(){
        return $this->belongsToMany('App\User');
    }

    public function uploads(){
        return $this->hasMany('App\Uploads');
    }
    public function trialTest(){
        return $this->hasMany('App\TrialTest');
    }

    public function exam(){
        return $this->hasMany('App\exam');
    }
}
