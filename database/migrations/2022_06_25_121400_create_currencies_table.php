<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->string('latin_name')->nullable()->default('null');
            $table->float('equality');
            $table->string('match')->default(null)->nullable();
            $table->string('part')->nullable()->default(null);
            $table->integer('accuracy');
            $table->string('lain_part_name')->default(null)->nullable();
            $table->string('photo')->nullable()->default(null);
            $table->integer('security_degree')->default(1);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('currencies');
    }
};
