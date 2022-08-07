<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('barcode');
            $table->string('convert_parameter');
            $table->unsignedBigInteger('unit_id');
            $table->boolean('not_fixed');
            $table->boolean('automatic_price_calculation');

            $table->string('default_unit');
            $table->float('item_limit');

            $table->float('value');
            $table->float('gain');
            $table->string('percentage_gain');

            $table->timestamps();
            $table->foreign('unit_id')->references('id')->on('units');


            $table->float('last_purchase');
            $table->float('middle_purchase');
            $table->float('max_purchase');
            $table->float('min_price');
            $table->float('cost');


            $table->unsignedBigInteger('currency_id');
            $table->float('equality');
            $table->float('automatic_discount_on_sale');
            $table->float('added_value_tax');
            $table->string('pricing_method');
//            $table->boolean('is_default')->default(false);


        });
    }


    public function down()
    {
        Schema::dropIfExists('units');
    }
};
