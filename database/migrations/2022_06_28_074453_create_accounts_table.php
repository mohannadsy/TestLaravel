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
            $table->string('type');
            $table->string('account_id');
            $table->boolean('is_final');
            $table->unsignedBigInteger('final_account_id');
            $table->unsignedBigInteger('cost_center_id');
            $table->string('currency_id');
            $table->integer('equality');
            $table->integer('budget');
            $table->string('nature');
            $table->string('current_balance');
            $table->unsignedBigInteger('final_account_result_id');
            $table->string('notes');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
