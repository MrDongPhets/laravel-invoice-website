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
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('pending'); // Example default value
            $table->string('invoice'); // Assuming this is a unique identifier or similar
            $table->string('customer'); // Corrected spelling from 'costumer' to 'customer'
            $table->decimal('amount', 10, 2); // Assuming amount with precision and scale
            $table->date('due'); // Due date
            $table->date('issued'); // Issued date
      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
