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
        Schema::create('sugar_levels', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name', 50);
            $table->string('patient_sugar_level', 20);
            $table->foreignId('user_id')->constrained('users');
            $table->bigInteger('datetime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sugar_levels');
    }
};
