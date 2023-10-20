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
        Schema::create('ticket', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ref_ticket');
            $table->text('description'); 
            $table->string('type', 50);
            $table->decimal('amount', 10, 2); 
            $table->unsignedBigInteger('payments_id');
            $table->integer('nbre_tickets'); 
            
            $table->foreign('payments_id')
                ->references('id')
                ->on('payments')
             ->onDelete('restrict')
                ->onUpdate('restrict');
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
        Schema::dropIfExists('ticket');

    }
};
