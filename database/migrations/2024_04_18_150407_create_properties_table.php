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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->text('description');
            $table->string('address');
            $table->decimal('price', 10, 2);
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->float('area');
            $table->enum('type', ['house', 'apartment', 'office', 'villa', 'commercial']);
            $table->enum('status', ['available', 'sold'])->default('available');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }

};
