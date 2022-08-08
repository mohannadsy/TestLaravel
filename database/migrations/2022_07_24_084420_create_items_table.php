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

            $table->string('place');
            $table->string('manufacture_company');
            $table->string('origin_country');
            $table->string('source');
            $table->string('caliber');
            $table->string('chemical_composition');
            $table->float('weight');
//            $table->float('size');
            $table->string('notes');
            $table->string('photo');


            $table->string('type');
            $table->string('product_date');
            $table->boolean('expiration_date_force_on_input');
            $table->boolean('expiration_date_force_on_output');
            $table->boolean('aggregate_item');
            $table->boolean('modified_item');
            $table->boolean('serial_number_force_on_input');
            $table->boolean('serial_number_force_on_output');

            $table->boolean('is_service');
            $table->boolean('is_stored');
            $table->boolean('is_origin');


            $table->integer('store_id');
            $table->float('amount');
            $table->float('amount_sum');
            $table->boolean('is_additive');
            $table->json('additive_IDs');

            $table->string('code_starts_with');
            $table->string('name_starts_with');
            $table->string('color');
            $table->float('size');
            $table->float('height');
            $table->float('width');
            $table->float('length');



            $table->timestamps();
            // updates : add branch in all cards
            $table->unsignedBigInteger('branch_id')->nullable()->default(1);
            $table->foreign('branch_id')->references('id')->on('branches');


            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

        });
    }


    public function down()
    {
        Schema::dropIfExists('items');
    }
};
