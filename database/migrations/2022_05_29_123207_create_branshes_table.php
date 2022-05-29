<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branshes', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('name') ;
            $table->unsignedBigInteger('main_bransh_id');
            $table->string('resposability');
            $table->string('address');
            $table->string('website');
            $table->string('email') ->unique();
            $table->string('phone');
            $table->string('mobile');
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
        Schema::dropIfExists('branshes');
    }
};
