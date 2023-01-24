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
        Schema::create('spare_part_translations', function (Blueprint $table) {
            $table->id();
            $table->string('over_view');
            $table->string('name');
            $table->foreignId('language_id')->constrained()->cascadeOnDelete();


            $table->foreignId('spare_part_id')->nullable();
            $table->foreign('spare_part_id')->on('spare_parts')->references('id')->cascadeOnDelete();


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
        Schema::dropIfExists('spare_part_translations');
    }
};
