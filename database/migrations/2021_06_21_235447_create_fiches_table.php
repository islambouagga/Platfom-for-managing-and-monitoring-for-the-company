<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiches', function (Blueprint $table) {
            $table->id();
            $table->boolean('valider');
            $table->string('type')->nullable();
            // FICHE LABO
            $table->string('typeMateriaux')->nullable();
            $table->string('provenance')->nullable();
            $table->string('destination')->nullable();
            $table->integer('nbrElemCntrl')->nullable();
            $table->date('dateEssai')->nullable();
            $table->string('raliserPar')->nullable();
            //recuperation doc
            $table->string('typeDocR')->nullable();
            $table->string('lieuR')->nullable();
            //depot doc
            $table->string('typeDocD')->nullable();
            $table->string('lieuD')->nullable();
            //reunion
            $table->string('natureReunion')->nullable();
            $table->string('objetReunion')->nullable();
            $table->json('participants')->nullable();
            //essai in situ
            $table->string('typeCntrl')->nullable();
            $table->string('natureEssai')->nullable();
            $table->integer('nbrPointsES')->nullable();
            $table->string('traveauxControler')->nullable();
            $table->string('lineaireES')->nullable();
            //prelevement
            $table->string('typeMateriauxP')->nullable();
            $table->string('provenancePrelev')->nullable();
            $table->string('destinationPrelev')->nullable();
            //assistance
            $table->string('natureTraveaux')->nullable();
            $table->string('lineaireAss')->nullable();
            $table->integer('nbrPointsAss')->nullable();
            //
            $table->unsignedBigInteger('intervenant_id')->nullable();
            $table->foreign('intervenant_id')->references('id')->on('intervenants');
            $table->unsignedBigInteger('projet_id')->nullable();
            $table->foreign('projet_id')->references('id')->on('projets');
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
        Schema::dropIfExists('fiches');
    }
}
