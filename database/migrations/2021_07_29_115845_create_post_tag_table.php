<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();

            // !Foreign Key 1!
            $table->unsignedBigInteger('post_id');

            $table->foreign('post_id')  // nome campo/colonna
                ->references('id')      // campo/colonna collegato nella tabella di riferimento
                ->on('posts')           // tabella di riferimento
                ->onDelete('CASCADE');  // gestione cancellazione
            
            // !Foreign Key 2!
            $table->unsignedBigInteger('tag_id');

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('CASCADE');

            // $table->timestamps(); - Timestamps NON necessari nella tabella Pivot
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag'); // Nella Pivot mi basta il dropIfExists()
    }
}
