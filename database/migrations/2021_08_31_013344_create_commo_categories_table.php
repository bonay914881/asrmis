<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommoCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c4s_commo_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_group_id');
            $table->unsignedBigInteger('category_id');
            $table->string('commo_code');
            $table->string('commo_category');
            $table->string('commo_desc');     
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
        Schema::dropIfExists('c4s_commo_category');
    }
}
