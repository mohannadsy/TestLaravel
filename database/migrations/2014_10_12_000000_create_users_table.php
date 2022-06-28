


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

            $table->string('role')->nullable()->default(null);
            $table->string('branch_id')->nullable()->default(null);
            $table->string('first_name')->nullable()->default(null);
            $table->string('middle_name')->nullable()->default(null);
            $table->string('last_name')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('id_number')->nullable()->default(null);
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('mobile')->nullable()->default(null);
            $table->string('notes')->nullable()->default(null);
//            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};

