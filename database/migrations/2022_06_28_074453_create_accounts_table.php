<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {


            $table->id();
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->string('latin_name')->default(null)->nullable();
            $table->string('type')->default('normal');
            $table->string('notes')->default(null)->nullable();


            $table->boolean('is_active')->default(true);
            $table->boolean('is_client')->default(false);


            $table->unsignedBigInteger('account_id')->nullable()->default(null);
            $table->unsignedBigInteger('final_account_id')->nullable()->default(null);
            $table->unsignedBigInteger('cost_center_id')->nullable()->default(null);
            $table->unsignedBigInteger('currency_id')->default(null)->nullable();
            $table->integer('equality')->default(null)->nullable();

            $table->string('budget')->default('not_debtor_not_creditor');
            $table->integer('budget_value')->nullable()->default(null);

            $table->string('nature')->default('debtor_and_creditor');
            $table->string('division_rate')->default(null)->nullable();
            $table->string('rates_sum')->default(null)->nullable();
            $table->string('creditor')->default(null)->nullable();
            $table->string('debtor')->default(null)->nullable();
            $table->integer('balance')->default(0)->nullable();


            $table->string('not_debtor_not_creditor')->default(null)->nullable();
            $table->boolean('is_aggregate')->default(false);
            $table->boolean('is_distributive')->default(false);
            $table->boolean('is_final')->default(false);
            $table->string('debtor_and_creditor')->default(null)->nullable();
            $table->integer('security_degree')->default(1);
            $table->json('aggregate_ids');
            $table->json('distributive_ids');



            $table->timestamps();


            $table->foreign('account_id')->references('id')->on('accounts');

        });
    }


    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
