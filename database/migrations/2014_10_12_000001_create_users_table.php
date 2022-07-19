<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            $table->unsignedBigInteger('branch_id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name')->nullable();
            $table->string('phone');

            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('mobile');
            $table->string('notes')->nullable();

            $table->string('id_number');

            $table->integer('account_box_id');
            $table->integer('store_id');
            $table->boolean('is_active');
            $table->integer('confidentiality_degree');
            $table->integer('confidentiality_level');

            $table->rememberToken();
//            $table->softDeletes();
            $table->timestamps();



            $table->foreign('branch_id')->references('id')->on('branches');

        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};

