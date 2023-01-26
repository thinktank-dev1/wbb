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
        Schema::create('vehicle_accident_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id');
            $table->string('previous_body_repairs');
            $table->string('previous_cosmetic_repairs');
            $table->string('mechanical_faults_warnig_lights');
            $table->text('mechanical_faults_warnig_lights_description')->nulluable();
            $table->string('windscreen_condition');
            $table->string('rims_condition');
            $table->string('interior_condition');
            $table->string('front_left_tire');
            $table->string('front_right_tire');
            $table->string('back_left_tire');
            $table->string('back_right_tire');
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
        Schema::dropIfExists('vehicle_accident_reports');
    }
};
