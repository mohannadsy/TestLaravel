<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('notes')->nullable()->default(null);
            $table->string('photo')->nullable()->default(null);
            $table->string('gender')->nullable()->default(null);
            $table->string('nationality')->nullable()->default(null);
            $table->string('work')->nullable()->default(null);
            $table->string('birth_place')->nullable()->default(null);
            $table->string('birth_data')->nullable()->default(null);
            $table->string('record_number')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->integer('email_prefix')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('mobile')->nullable()->default(null);
            $table->string('fax')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->integer('default_price')->nullable()->default(0);
            $table->string('discount_rate')->nullable()->default(null);
            $table->integer('discount_account')->nullable()->default(0);
            $table->string('payment_method')->nullable()->default(null);
            $table->integer('account_id')->nullable()->default(null);
            $table->integer('security_degree')->default(1);

            $table->unsignedBigInteger('branch_id')->nullable()->default(1);

            $table->timestamps();


        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
