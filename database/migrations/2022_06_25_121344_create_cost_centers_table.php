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
            $table->string('code')->default(null);
            $table->string('name')->default(null);
            $table->string('latin_name')->default(null);
            $table->unsignedBigInteger('center_id')->nullable()->default(null);
            $table->unsignedBigInteger('balance')->nullable()->default(null);
            $table->unsignedBigInteger('in_balance')->nullable()->default(null);
            $table->unsignedBigInteger('out_balance')->nullable()->default(null);
            $table->string('notes')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('center_id')->references('id')->on('cost_centers');
        });
    }
    public function down()
    {
        Schema::dropIfExists('cost_centers');
    }
};
