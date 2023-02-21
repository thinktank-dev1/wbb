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
        Schema::table('users', function (Blueprint $table) {
            $table->string('status')->after('password')->nullable();
            $table->string('id_document')->after('password')->nullable();
            $table->string('vat_registration')->after('password')->nullable();
            $table->string('brm')->after('password')->nullable();
            $table->string('proof_of_residence')->after('password')->nullable();
            $table->string('proxy_id')->after('password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
