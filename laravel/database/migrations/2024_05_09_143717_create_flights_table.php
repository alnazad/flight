<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('air_craft');
            $table->string('class');
            $table->string('fare');
            $table->string('route');
            $table->string('from');
            $table->string('to');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->string('duration');
            $table->decimal('seat',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
