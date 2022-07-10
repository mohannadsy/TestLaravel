<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->string('notes');

            $table->string('photo');

            $table->string('gender');
            $table->string('nationality');
            $table->string('work');
            $table->string('birth_place');
            $table->string('birth_data');
            $table->string('record_number');


            $table->string('address');
            $table->integer('email_code');
            $table->string('phone');
            $table->string('mobile');
            $table->string('fax');
            $table->string('email');


            $table->integer('default_price');
            $table->string('discount_rate');
            $table->integer('discount_account');
            $table->integer('account_id');

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
        Schema::dropIfExists('clients');
    }
};
