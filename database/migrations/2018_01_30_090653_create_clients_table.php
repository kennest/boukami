<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('photo');
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('nature_piece');
            $table->string('num_piece');
            $table->string('telephone');
            $table->string('habitation');
            $table->integer('age');
            $table->integer('niveau');
            $table->boolean('statut');
            $table->boolean('filleuils');
            $table->integer('formule_id')->unsigned();
            $table->foreign('formule_id')
                  ->references('id')
                  ->on('formules')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('clients');
    }
}
