<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/* php artisan migrate para que todas las migraciones se conviertan en tabla

php artisan make:migration create_posts_table para crear el archivo de migracion

php artisan migrate:refresh --seed elimina las tablas, vuelve y las crea y agrega los archivos semilla de la carpeta seeders que tienen que estar */

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('body');

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
        Schema::dropIfExists('posts');
    }
};
