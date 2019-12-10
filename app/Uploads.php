<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class uploads extends Model
{
    //table name
    protected $table="uploads";
    //PrimaryKey
    public $primaryKey="id";
    //timestamp
    public $timestamps=true;

    public function subject(){
        return $this->belongsTo('App\Uploads');
    }
}