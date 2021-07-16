<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('nomClt');
            $table->string('prenomClt');
            $table->string('emailClt');
            $table->string('adressClt');
            $table->date('dateNClt');
            $table->bigInteger('tel');
            $table->bigInteger('rc')->nullable();
            $table->bigInteger('nif')->nullable();
            $table->string('contact');
            $table->string('type');
            $table->string('raisonSociale')->nullable();
            $table->bigInteger('fax')->nullable();
            $table->string('designationClt');
            $table->string('quality');
            $table->string('wilayas');
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
