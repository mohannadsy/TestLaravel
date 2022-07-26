<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

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

            $table->integer('category_id');
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



            $table->string('type');
            $table->string('product_date');
            $table->boolean('force_on_output');
            $table->boolean('force_on_input');
            $table->boolean('aggregate_item');
            $table->boolean('modified_item');

            $table->boolean('is_service');
            $table->boolean('is_stored');
            $table->boolean('origin');

            $table->timestamps();
            // updates : add branch in all cards
            $table->unsignedBigInteger('branch_id')->nullable()->default(1);
            $table->foreign('branch_id')->references('id')->on('branches');



            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');

        });
    }


    public function down()
    {
        Schema::dropIfExists('items');
    }
};
