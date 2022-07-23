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
            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->string('latin_name')->nullable()->default( null);
            $table->string('type')->default('normal');
            $table->unsignedBigInteger('store_id')->default(null)->nullable();
            $table->unsignedBigInteger('account_id')->default(null)->nullable();
            $table->string('address')->nullable()->default(null);
            $table->string('store_keeper')->nullable()->default(null);
            $table->integer('storage_amount')->default(null)->nullable();
            $table->string('website')->nullable()->default(null);
            $table->string('notes')->nullable()->default(null);
            $table->boolean('is_active')->default(true);
            $table->string('photo')->nullable()->default(null);
            $table->integer('security_degree')->default(1);
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
