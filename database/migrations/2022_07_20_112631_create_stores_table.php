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
            $table->string('code')->default(null);
            $table->string('name');
            $table->string('latin_name');
            $table->string('type');
            $table->unsignedBigInteger('store_id')->default(null)->nullable();
            $table->unsignedBigInteger('account_id')->default(null)->nullable();
            $table->string('address');
            $table->string('store_keeper');
            $table->integer('storage_amount')->default(null)->nullable();
            $table->string('website');
            $table->string('nodes');
            $table->boolean('is_active')->default(null);
            $table->string('photo');
            $table->integer('confidentiality_degree')->default(null)->nullable();
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
