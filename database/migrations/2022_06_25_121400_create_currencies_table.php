<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('null');
            $table->string('code')->default('null');
            $table->string('latin_name')->nullable()->default('null');
            $table->float('equality');
            $table->string('match');
            $table->string('part');
            $table->integer('accuracy');
            $table->string('lain_part_name');
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
        Schema::dropIfExists('currencies');
    }
};
