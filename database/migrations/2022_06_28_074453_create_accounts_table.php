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
            $table->string('notes');


            $table->boolean('is_active');
            $table->boolean('is_client');


            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('final_account_id');
            $table->unsignedBigInteger('cost_center_id');
            $table->unsignedBigInteger('currency_id');
            $table->integer('equality');

            $table->string('budget')->default('not_debtor_not_creditor');
            $table->integer('budget_value');

            $table->string('nature')->default('debtor_and_creditor');
            $table->string('division_rate');
            $table->string('rates_sum');
            $table->string('creditor');
            $table->string('debtor');
            $table->integer('balance');


            $table->string('not_debtor_not_creditor');
            $table->string('is_aggregate');
            $table->string('is_distributive');
            $table->boolean('is_final');
            $table->string('debtor_and_creditor');
            $table->integer('confidentiality_degree');

            $table->timestamps();


            $table->foreign('account_id')->references('id')->on('accounts');

        });
    }


    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
