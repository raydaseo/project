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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_users')->default(1)->constrained('users')->onDelete('cascade');
            $table->foreignId('id_employees')->constrained('employees')->onDelete('cascade');
            $table->date('date');
            $table->enum('status', ['Requested', 'Accepted', 'Rejected'])->default('Requested');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
