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
    Schema::create('bookings', function (Blueprint $table) {
        $table->id('booking_id');
        $table->unsignedBigInteger('flight_id')->nullable();
        $table->unsignedBigInteger('hotel_id')->nullable();
        $table->unsignedBigInteger('guide_id')->nullable();
        $table->integer('person')->default(1);
        $table->decimal('subtotal', 10, 2);
        $table->unsignedBigInteger('package_id');
        $table->string('email');
        $table->timestamp('payment_date');
        $table->enum('status', ['paid', 'unpaid', 'cancelled'])->default('paid');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
