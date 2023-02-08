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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('mmcode');
            $table->year('year');
            $table->string('make');
            $table->string('model');
            $table->string('variant');
            $table->string('body_type');
            $table->string('mileage');
            $table->string('fuel_type');
            $table->string('transmission');
            $table->string('color');
            $table->string('engine_type');
            $table->string('cylinders');
            $table->string('vin_number');
            $table->string('engine_number');
            $table->string('natis')->nullable();
            $table->string('service_history');
            $table->string('service_book');
            $table->string('service_plan');
            $table->string('warranty');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
};
