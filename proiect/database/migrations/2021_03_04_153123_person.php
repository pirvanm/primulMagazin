<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Person extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persoan', function (Blueprint $table) {
            //Corpul pentru coloane 
            $table->bigIncrements('id');
            //bigImcrement este tipul coloane
            //   bigIncremenets('coloana');
            $table->string('nume');
            $table->string('prenume')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telefon');
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
        //
    }
}
