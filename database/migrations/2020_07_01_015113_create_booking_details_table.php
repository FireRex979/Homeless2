<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings');
            $table->enum('jenis_product', ['furniture', 'property', 'paket']);
            $table->foreignId('furniture_id')->constrained('furnitures');
            $table->foreignId('paket_id')->constrained('paket_furnitures');
            $table->foreignId('property_id')->constrained('tipe_rumahs');
            $table->integer('qty');
            $table->integer('subtotal');
            $table->enum('status', ['tersedia', 'tidak tersedia']);
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
        Schema::dropIfExists('booking_details');
    }
}
