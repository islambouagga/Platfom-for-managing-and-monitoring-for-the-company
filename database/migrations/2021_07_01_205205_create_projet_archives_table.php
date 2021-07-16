<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('projet_archives', function (Blueprint $table) {
            $table->id();
            $table->date('dateOuverture');
            $table->date('dateFin');
            $table->string('designationPrj');
            $table->string('nomPrj');
            $table->string('typePrj');
            $table->string('raisonIntervention');
            $table->string('wilayas');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('intervenant_id')->nullable();
            $table->unsignedBigInteger('chargePrj_id')->nullable();
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
        Schema::dropIfExists('projet_archives');
    }
}
