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
        Schema::create('event_user_reservations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');

            $table->unsignedBigInteger('event_reservation_id');
            $table->foreign('event_reservation_id')->references('id')->on('event_reservations')
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');

            $table->unsignedBigInteger('business_user_id');
            $table->foreign('business_user_id')->references('id')->on('business_users')
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');                           
            $table->boolean('payment_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_user_reservations');
    }
};
