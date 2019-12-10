<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    //PrimaryKey
    public $primaryKey="id";
    //timestamp
    public $timestamps=true;
    public function user(){
        return $this->belongsTo('App\exam');
    }
}
