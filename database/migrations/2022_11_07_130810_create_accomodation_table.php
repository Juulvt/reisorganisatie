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
        Schema::create('accomodations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 32);
            $table->string('city', 32);
            $table->string('address', 128);
            $table->tinyInteger('min_amount_visitors');
            $table->tinyInteger('max_amount_visitors');
            $table->unsignedDecimal('cost', $precision = 8, $scale = 2);
            $table->foreignId('location_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('accomodation_type_id')->nullable()->constrained()->nullOnDelete();
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
        Schema::dropIfExists('accomodation');
    }
};
