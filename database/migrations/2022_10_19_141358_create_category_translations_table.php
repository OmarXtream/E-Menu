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
        Schema::create('category_translations', function (Blueprint $table) {
             $table->id();
             $table->string('locale');
             $table->string('title');
             $table->text('content');

             $table->unsignedBigInteger('category_id');

             $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');


                        //   $table->unique(['category_id', 'locale']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_translations');
    }
};
