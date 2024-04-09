<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('cards', function (Blueprint $table) {
        $table->id();  
        $table->string('title');  
        $table->text('description')->nullable();  
        $table->decimal('price', 8, 2);  
        $table->string('info');  
        $table->string('type');
        $table->timestamps();  
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_servicescards');
    }
};
 