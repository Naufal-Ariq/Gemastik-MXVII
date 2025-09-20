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
        Schema::create('frontuser', function (Blueprint $table) {
            $table->id();
            $table->text('Flowers_Group');
            $table->text('Flowers_Name');
            $table->text('Containers');
            $table->text('Flowers_Time');
            $table->text('Miscellaneous');
            $table->text('Plant_Habit');
            $table->text('Sun_Requirements');
            $table->text('Suitable_Locations');
            $table->text('Minimum_cold_hardiness');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frontuser');
    }
};
