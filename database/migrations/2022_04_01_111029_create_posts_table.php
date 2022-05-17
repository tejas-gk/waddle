<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

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
            $table->text('post')->nullable();
            $table->string('slug')->unique();
            $table->integer('pinned')->nullable();
     
            $table->string('image')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->softDeletes();
            // $table->float('compound')->nullable();
            $table->float('pos')->default(0);
            $table->float('neg')->default(0);
            $table->float('net')->default(1);
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
