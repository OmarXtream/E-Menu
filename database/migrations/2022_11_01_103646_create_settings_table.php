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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->unllable();
            $table->string('favicon')->unllable();
            $table->string('images')->unllable();
            $table->string('twitter')->unllable();
            $table->string('instagram')->unllable();
            $table->string('tiktok')->unllable();
            $table->string('snapchat')->unllable();
            $table->string('facebook')->unllable();
            $table->string('phone')->unllable();
            $table->string('email')->unllable();

            

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
        Schema::dropIfExists('settings');
    }
};
