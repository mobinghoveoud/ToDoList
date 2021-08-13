<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'tasks', function ( Blueprint $table ) {
            $table->id();
            $table->foreignId( 'user_id' )->constrained();
            $table->string( 'title', 100 );
            $table->text( 'detail' )->nullable();
            $table->tinyInteger( 'day' );
            $table->time( 'time' );
            $table->boolean( 'completed' )->default( FALSE );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'tasks' );
    }
}
