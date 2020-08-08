<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOuvragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ouvrages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre', 80);
            $table->smallInteger('annee_edition')->unsigned()->nullable();
            $table->string('isbn', 25)->nullable();
            $table->smallInteger('num_exmp')->unsigned()->nullable();
            $table->text('resume')->nullable();
            $table->boolean('disponible')->default(true);

            $table->integer('auteur_id')->unsigned()->nullable();
            $table->foreign('auteur_id')->references('id')->on('auteurs');

            $table->integer('edition_id')->unsigned()->nullable();
            $table->foreign('edition_id')->references('id')->on('editions');

            $table->integer('langue_id')->unsigned()->nullable();
            $table->foreign('langue_id')->references('id')->on('langues');

            $table->integer('type_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('types');

            $table->datetime('deleted_at')->nullable();
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
        Schema::dropIfExists('ouvrages');
    }
}
