<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPerumahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_perumahans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipe_rumah_id')->constrained('tipe_rumahs');
            $table->foreignId('perumahan_id')->constrained('perumahans');
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
        Schema::dropIfExists('detail_perumahans');
    }
}
