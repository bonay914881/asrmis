<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunicationEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c4s_equipment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nomenclature_id');
            $table->string('serial_number');
            $table->string('unitcode');
            $table->string('pamu');  
            $table->string('status');  
            $table->string('specification');  
            $table->string('remarks')->nullable();   
            $table->string('date_acquired')->nullable();  
            $table->string('cost_acquired')->nullable();  
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
        Schema::dropIfExists('c4s_equipment');
    }
}
