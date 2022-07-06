<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {


            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('latin_name');
            $table->string('type')->default('Normal');
            $table->unsignedBigInteger('account_id');
            $table->boolean('is_final');
            $table->boolean('is_active');
            $table->boolean('is_client');
            $table->unsignedBigInteger('final_account_id');
            $table->unsignedBigInteger('cost_center_id');
            $table->unsignedBigInteger('currency_id');
            $table->integer('equality');
            $table->string('budget')->nullable()->default(null);
            $table->integer('budget_value');
            $table->string('nature')->default('creditor');
            $table->string('division_rate');
            $table->string('rates_sum');
            $table->string('creditor');
            $table->string('debtor');
            $table->integer('balance');
            $table->string('notes');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
