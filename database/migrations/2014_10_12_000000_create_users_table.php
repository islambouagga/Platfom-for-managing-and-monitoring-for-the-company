<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nomUtilis');
            $table->string('prenomUtilis');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('adressUtilis');
            $table->bigInteger('tel');
            $table->bigInteger('usertable_id');
            $table->string('usertable_type');
            $table->string('password');
            $table->date('dateNUtilis');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
