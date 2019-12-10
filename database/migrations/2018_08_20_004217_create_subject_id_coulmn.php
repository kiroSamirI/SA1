<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectIdCoulmn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uploads' ,function($table){
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects'); 
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('uploads' ,function($table){
            $table->dropColumn('subject_id');  
      });
    }
}
