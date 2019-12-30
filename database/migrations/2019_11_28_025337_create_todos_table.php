<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('plan_finish_date');
            $table->date('date_of_take');
            $table->timestamps();
        });

        Schema::create('todo_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('todo_id'); 
            $table->string('title');
            $table->string('text');
            $table->string('attachment');           
            $table->timestamps();
        });

        Schema::create('todo_attachments', function (Blueprint $table) {
            $table->bigIncrements('id');  
            $table->bigInteger('todo_id');  
            $table->string('name');
            $table->string('file');        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
        Schema::dropIfExists('todo_details');
        Schema::dropIfExists('todo_attachments');
    }
}
