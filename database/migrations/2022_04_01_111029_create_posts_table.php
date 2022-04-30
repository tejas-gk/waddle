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
            $table->integer('pinned')->nullable();
            $table->foreignId('user_id_for_pinned')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('user_id');
           
            $table->integer('is_verified')->default(0);
            $table->foreign('user_id_for_pinned')->references('id')->on('users')->onDelete('cascade');
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
