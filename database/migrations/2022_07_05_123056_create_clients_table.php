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

            $table->string(' name');
            $table->string('notes');
            $table->string(' fax');
            $table->string('mobile');
            $table->string(' phone');
            $table->string('email');
            $table->integer(' email_code');
            $table->string('address');
            $table->date(' birth_data');
            $table->string('birth_place');
            $table->string(' work');
            $table->string('nationality');
            $table->string(' gender');
            $table->string('photo');
            $table->integer('default_price');
            $table->string(' discount_rate');
            $table->integer('discount_account');


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
