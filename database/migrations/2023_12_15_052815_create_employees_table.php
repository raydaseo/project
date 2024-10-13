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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('id_users');
            $table->string('name');
            $table->foreignId('id_users')->default(1)->constrained('users')->onDelete('cascade');
            $table->string('position');
            $table->date('dob')->nullable;
            $table->string('telephone');
            $table->string('username')->Unique();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->timestamps();

            //membuat foreign
            //$table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
