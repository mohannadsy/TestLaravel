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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('latin_name');
            $table->string('type');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('account_id');
            $table->string('address');
            $table->string('store_keeper');
            $table->integer('storage_amount');
            $table->string('website');
            $table->string('nodes');
            $table->boolean('is_active');
            $table->string('photo');
            $table->integer('confidentiality_degree');
            $table->timestamps();

            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('account_id')->references('id')->on('accounts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
};
