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
        Schema::create('branches', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('code') ;
            $table->string('name') ;
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->string('responsibility')->nullable();
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->string('email') ->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
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