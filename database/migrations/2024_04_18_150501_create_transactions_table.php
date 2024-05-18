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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Foreign key to users table
            $table->foreignId('properties_id')->constrained()->onDelete('cascade');  // Foreign key to properties table
            $table->foreignId('client_id')->constrained()->onDelete('cascade');  // Foreign key to clients table
            $table->foreignId('agent_id')->constrained()->onDelete('cascade');  // Foreign key to agents table
            $table->dateTime('transaction_date');  // Date and time of the transaction
            $table->enum('transaction_type', ['sale', 'rent']);  // Type of transaction
            $table->decimal('amount', 10, 2);  // Amount involved in the transaction
            $table->timestamps();  // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');  // Drop the table if it exists
    }
};
