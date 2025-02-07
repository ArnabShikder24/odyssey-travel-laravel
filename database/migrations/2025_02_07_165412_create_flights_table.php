<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('flights', function (Blueprint $table) {
        $table->id('flight_id');
        $table->string('flight_number');
        $table->string('seat_class');
        $table->timestamp('departure_time');
        $table->timestamp('arrival_time');
        $table->decimal('price', 8, 2);
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
