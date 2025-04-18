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
    Schema::create('donations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('cause_id')->constrained()->onDelete('cascade'); // Foreign key to Cause
        $table->decimal('amount', 10, 2); // Amount in decimal format
        $table->string('reference')->unique(); // Transaction reference
        $table->string('email'); // Donor's email
        $table->enum('status', ['pending', 'completed', 'failed'])->default('pending'); // Donation status
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
