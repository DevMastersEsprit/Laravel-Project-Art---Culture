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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("titre");
            $table->string("contenu");
            $table->string("description");
            // $table->integer('evenement_id')->unsigned()->nullable();
            $table->foreign('evenement_id')->references('id')->on('evenements')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('evenement_id')->nullable();
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
        Schema::dropIfExists('articles');
    }
};
