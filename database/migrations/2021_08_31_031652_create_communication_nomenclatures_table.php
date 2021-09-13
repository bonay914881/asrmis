<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunicationNomenclaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c4s_nomenclature', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commo_category_id');
            $table->string('equipment_code');
            $table->string('nomenclature');
            $table->string('classification');  
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
        Schema::dropIfExists('c4s_nomenclature');
    }
}
