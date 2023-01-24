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
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->enum('app_status',['pending', 'accepted', 'refused'])->default('pending');

            $table->foreignId('problem_id')->nullable();
            $table->foreign('problem_id')->on('problems')->references('id')->cascadeOnDelete();

            $table->foreignId('technecal_id')->nullable();
            $table->foreign('technecal_id')->on('users')->references('id')->cascadeOnDelete();
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
        Schema::dropIfExists('repairs');
    }
};
