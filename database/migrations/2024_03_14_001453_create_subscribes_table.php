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
        if (!Schema::hasTable('subscribes')) {
        Schema::create('subscribes', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('business_id')->constrained()->onDelete('cascade');
            // $table->foreignId('card_id')->constrained()->onDelete('cascade');

            $table->unsignedBigInteger('business_id');
            $table->foreign('business_id')->references('id')->on('business_users')->onDelete('cascade');
           
            $table->unsignedBigInteger('card_id');
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');

            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['Active', 'Inactive', 'Pending']);
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribes'); 
    }
};
