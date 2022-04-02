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
        Schema::dropIfExists('posts');
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('post');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('user_id');
           
            $table->integer('status_id')->nullable();
            $table->integer('comment_status_id')->nullable();
            $table->integer('comment_count')->default(0);
            $table->integer('view_count')->default(0);
            $table->integer('like_count')->default(0);
            $table->integer('dislike_count')->default(0);
            $table->integer('share_count')->default(0);
            $table->integer('favorite_count')->default(0);
            $table->integer('rating_count')->default(0);
            $table->integer('rating_sum')->default(0);
            $table->integer('rating_avg')->default(0);
            $table->integer('is_featured')->default(0);
            $table->integer('is_popular')->default(0);
            $table->integer('is_trending')->default(0);
            $table->integer('is_breaking')->default(0);
            $table->integer('is_recommended')->default(0);
            $table->integer('is_approved')->default(0);
            $table->integer('is_highlighted')->default(0);
            $table->integer('is_sticky')->default(0);
            $table->integer('is_tweeted')->default(0);
            $table->integer('is_community')->default(0);
            $table->integer('is_verified')->default(0);
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //    

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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('posts');
        Schema::disableForeignKeyConstraints();
    }
};
