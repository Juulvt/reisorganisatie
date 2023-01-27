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
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('email', 128)->unique();
            $table->string('phone', 128)->unique();
            $table->string('address', 128)->unique();
            $table->string('pinterest', 512)->unique();
            $table->string('facebook', 512)->unique();
            $table->string('instagram', 512)->unique();
            $table->string('linkedin', 512)->unique();
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
        Schema::dropIfExists('contact');
    }
};
