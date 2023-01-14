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
        // Schema::create('user_message', function (Blueprint $table) {
        //     $table->foreignId('user_id')->constrained('users', 'id');
        //     $table->foreignId('message_id')->constrained('messages', 'id');
        //     $table->boolean('read')->default(false);
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_message');
    }
};
