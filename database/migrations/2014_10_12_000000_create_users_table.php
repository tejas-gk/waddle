<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();

            $table->string('username')->unique()->nullable();
            $table->string('bio')->nullable();
            $table->string('website')->nullable();
            $table->string('gender')->nullable();
            $table->string('location')->nullable();
            $table->integer('role_id')->default(1);
            $table->string('banner')->nullable();
           
            $table->string('Apitoken')->nullable();
            $table->string('referral_code')->nullable();
            $table->string('referral_by')->nullable();
            $table->string('referral_by_code')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_banned')->default(false);
            $table->string('theme')->default('default');

        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('track-user');
        Schema::dropIfExists('users');
    }
};
