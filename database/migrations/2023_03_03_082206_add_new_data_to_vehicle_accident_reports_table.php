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
        Schema::table('vehicle_accident_reports', function (Blueprint $table) {
            $table->string('front_left_rim')->nullable();
            $table->string('front_right_rim')->nullable();
            $table->string('back_left_rim')->nullable();
            $table->string('back_right_rim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicle_accident_reports', function (Blueprint $table) {
            //
        });
    }
};
