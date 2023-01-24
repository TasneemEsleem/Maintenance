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
          
            $table->foreignId('country_id')->nullable();
            $table->foreign('country_id')->on('countries')->references('id')->cascadeOnDelete();

            $table->foreignId('city_id')->nullable();
            $table->foreign('city_id')->on('cities')->references('id')->cascadeOnDelete();


            $table->foreignId('admin_id')->nullable();
            $table->foreign('admin_id')->on('admins')->references('id')->cascadeOnDelete();

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
            $table->dropForeignIdFor('country_id');
            $table->dropForeignIdFor('city_id');
            $table->dropForeignIdFor('admin_id');

        });
    }
};
