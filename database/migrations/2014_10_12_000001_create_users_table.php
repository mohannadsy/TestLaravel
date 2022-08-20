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
            $table->string('password')->nullable()->default(null);
            $table->string('role');
            $table->unsignedBigInteger('branch_id');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone');
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('mobile');
            $table->string('notes')->nullable();
            $table->string('id_number');
            $table->integer('account_box_id')->nullable();
            $table->integer('store_id')->nullable();
            $table->boolean('is_active');
            $table->integer('security_degree')->nullable();
            $table->integer('security_level')->nullable();
            $table->rememberToken();
//            $table->softDeletes();
            $table->timestamps();
            $table->foreign('branch_id')->references('id')->on('branches');

//            $table->json('attachment_id')->nullable()->default(null);


        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};

