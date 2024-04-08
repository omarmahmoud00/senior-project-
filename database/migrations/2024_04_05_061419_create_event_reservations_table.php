<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->integer('number_of_tickets');
            $table->decimal('price', 8, 2);
            $table->dateTime('start_date');
            $table->dateTime('end_date');

            $table->unsignedBigInteger('business_id');
            
            $table->foreign('business_id')->references('id')->on('business_users')
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');
                                       
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventreservations');
    }
};
