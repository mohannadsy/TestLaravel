<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('latin_name');
            $table->boolean('is_active');
            $table->boolean('is_inherited');
            $table->integer('security_degree');
            $table->string('class');
            $table->string('place');
            $table->string('manufacture_company');
            $table->string('origin_country');
            $table->string('source');
            $table->string('caliber');
            $table->string('chemical_composition');
            $table->float('weight');
            $table->float('size');
            $table->string('notes');
            $table->string('photo');



            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('items');
    }
};
