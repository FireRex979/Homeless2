<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKelebihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kelebihans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perumahan_id')->constrained('perumahans');
            $table->foreignId('kelebihan_id')->constrained('kelebihans');
            $table->integer('nilai');
            $table->timestamps();
            $table->datetime('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_kelebihans');
    }
}
