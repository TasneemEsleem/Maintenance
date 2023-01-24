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
        Schema::create('repair_spare_parts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('repairs_id')->nullable();
            $table->foreign('repairs_id')->on('repairs')->references('id')->cascadeOnDelete();


            $table->foreignId('spare_parts_id')->nullable();
            $table->foreign('spare_parts_id')->on('spare_parts')->references('id')->cascadeOnDelete();
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
        Schema::dropIfExists('repair_spare_parts');
    }
};
