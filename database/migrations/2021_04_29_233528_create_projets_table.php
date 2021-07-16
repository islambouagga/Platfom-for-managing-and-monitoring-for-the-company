<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->date('dateOuverture');
            $table->date('dateFin');
            $table->string('designationPrj');
            $table->string('nomPrj');
            $table->string('typePrj');
            $table->string('raisonIntervention');
            $table->string('wilayas');

            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
            //clients =nom de la table client (migration)

            $table->unsignedBigInteger('intervenant_id')->nullable();
            $table->foreign('intervenant_id')->references('id')->on('intervenants');

            $table->unsignedBigInteger('chargePrj_id')->nullable();
            $table->foreign('chargePrj_id')->references('id')->on('charge_prjs');

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
        Schema::dropIfExists('projets');
    }
}
