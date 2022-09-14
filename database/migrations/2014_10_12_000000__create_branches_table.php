<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use  \App\Traits\Branch\BranchTrait;

return new class extends Migration {


    public function up()
    {

        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name')->unique();
<<<<<<< HEAD
            $table->unsignedBigInteger('branch_id')->nullable()->default('1');
=======
//            $value=getFatherBranch($table->id());
//            $table->unsignedBigInteger('branch_id')->nullable()->default($value);
            $table->unsignedBigInteger('branch_id')->nullable()->default(null);
>>>>>>> b391c631ffc8f63df8ea319fb58deea308c93158
            $table->string('responsibility')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('website')->nullable()->default(null);
            $table->string('email')->nullable()->default(null)->unique();
            $table->string('phone')->nullable()->default(null);
            $table->string('mobile')->nullable()->default(null);
            $table->boolean('is_active')->default(true);
            $table->integer('security_degree')->default(1);
            $table->timestamps();
            $table->foreign('branch_id')->references('id')->on('branches');

//            $table->unsignedBigInteger('attachment_id')->nullable()->default(null);

//            $table->foreign('attachment_id')->references('id')->on('attachments');


        });
    }

    public function down()
    {
        Schema::dropIfExists('branches');
    }
};
