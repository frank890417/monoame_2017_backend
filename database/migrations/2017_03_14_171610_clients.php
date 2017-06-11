<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            // $table->uuid();
            $table->string('name');
            $table->string('contact_person_name');
            $table->string('contact_person_fb');
            $table->string('phone');
            $table->string('email');
            $table->string('business');
            $table->string('website','500');
            $table->string('other');



            //
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
        Schema::drop('clients');
    }
}
