<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trialTest extends Model
{
    protected $table="trialTest";
    //PrimaryKey
    public $primaryKey="id";
    //timestamp
    public $timestamps=true;
    public function user(){
        return $this->belongsTo('App\trialTest');
    }
}
