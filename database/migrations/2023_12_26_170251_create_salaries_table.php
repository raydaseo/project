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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_users')->default(2)->constrained('users')->onDelete('cascade');
            $table->foreignId('id_employees')->constrained('employees')->onDelete('cascade');
            $table->integer('salary'); // Precision 10, Scale 2 (maksimal 9999999.99)
            $table->integer('bonus'); // Precision 10, Scale 2 (maksimal 9999999.99)
            $table->date('date');
            $table->integer('total'); // Precision 10, Scale 2 (maksimal 9999999.99)
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
