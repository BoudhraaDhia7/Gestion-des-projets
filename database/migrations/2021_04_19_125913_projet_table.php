<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->timestamps();
            $table->string("Titre");
            $table->string("Adresse");
            $table->string("Budget")->nullable();
            $table->string("con")->nullable();
            $table->string("emp")->nullable();
            $table->string("Lat")->nullable();
            $table->string("Lon")->nullable();
            $table->string("DateLancement");
            $table->string("DateFinal")->nullable();
            $table->string("Cat")->required();
            $table->string("Type")->required();
            $table->index("id");
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
