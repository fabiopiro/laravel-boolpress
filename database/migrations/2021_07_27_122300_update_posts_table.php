<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // me

            // Creo Colonna Foreign Key
            $table->unsignedBigInteger('category_id') // singolare_id
            ->nullable()
            ->after('id');

            // Vincolo Colonna Foreign Key
            $table->foreign('category_id') // nome colonna
            ->references('id')   // Colonna nella tabella collegata
            ->on('categories')  // tabella collegata
            ->onDelete('SET NULL');   // gestione cancellazione

            // me
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // me

            // Cancello il Vincolo (!prima di cancellare la colonna!)
            // 'posts_category_id_foreign' - nomenclatura Laravel - documentazione
            $table->dropForeign('posts_category_id_foreign');
            

            // Cancello la Colonna
            $table->dropColumn('category_id');

            // me
            // !php artisan migrate! - !fare la migrate!
            // check DB
        });
    }
}
