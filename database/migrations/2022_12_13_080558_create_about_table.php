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
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('title', 128)->unique();
            $table->string('description', 2048)->unique();
            $table->string('subtitle', 128)->unique();
            $table->string('text', 2048)->unique();
            $table->string('image_path1', 512)->nullable();
            $table->string('image_path2', 512)->nullable();
            $table->string('image_path3', 512)->nullable();
            $table->string('image_path4', 512)->nullable();
            $table->string('image_path5', 512)->nullable();
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
        Schema::dropIfExists('about');
    }
};
