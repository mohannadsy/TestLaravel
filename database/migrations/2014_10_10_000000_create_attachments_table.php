<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string('path')->nullable()->default('path');
            $table->string('name')->nullable()->default('name');
            $table->string('type')->nullable()->default('type');
            $table->string('table')->nullable()->default(null);
            $table->string('table_id')->nullable()->default(null);
//            $table->unsignedBigInteger('attachment_id')->nullable();

//            $table->foreign('attachment_id')->references('id')->on('stores');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('attachments');
    }
};
