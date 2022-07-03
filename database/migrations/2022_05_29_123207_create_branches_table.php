<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('code')->default(null);
            $table->string('name')->default(null);
            $table->unsignedBigInteger('branch_id')->nullable()->default(null);
            $table->string('responsibility')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('website')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('mobile')->nullable()->default(null);
            $table->boolean('active')->default(false);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('branshes');
    }
};
