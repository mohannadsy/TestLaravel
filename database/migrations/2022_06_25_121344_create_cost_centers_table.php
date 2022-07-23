<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cost_centers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->string('latin_name')->default(null)->nullable();
            $table->unsignedBigInteger('center_id')->nullable()->default(null);
            $table->unsignedBigInteger('balance')->nullable()->default(0);
            $table->unsignedBigInteger('in_balance')->nullable()->default(0);
            $table->unsignedBigInteger('out_balance')->nullable()->default(0);
            $table->string('notes')->nullable()->default(null);
            $table->integer('security_degree')->default(1);//منخفضة
            $table->timestamps();

            $table->foreign('center_id')->references('id')->on('cost_centers');
        });
    }
    public function down()
    {
        Schema::dropIfExists('cost_centers');
    }
};
