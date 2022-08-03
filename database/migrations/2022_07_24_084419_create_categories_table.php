<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('latin_name');
            $table->string('security_degree');
            $table->string('type');
            $table->boolean('is_active');
            $table->boolean('is_aggregate');
            $table->string( 'notes');



            $table->timestamps();

            // updates : add branch in all cards
            $table->unsignedBigInteger('branch_id')->nullable()->default(1);
            $table->foreign('branch_id')->references('id')->on('branches');


        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
