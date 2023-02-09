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
        Schema::create('inpatient_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('dokter_id');
            $table->integer('lama_inap');
            $table->integer('biaya');
            $table->integer('pajak');
            $table->integer('total_bayar');
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('dokter_id')->references('id')->on('doctors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inpatient_records');
    }
};