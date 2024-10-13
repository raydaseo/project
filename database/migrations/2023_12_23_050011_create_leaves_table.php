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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_users')->default(1)->constrained('users')->onDelete('cascade');
            $table->foreignId('id_employees')->constrained('employees')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('description');
            $table->string('responsible_person');
            $table->enum('status_admin', ['Requested', 'Accepted', 'Rejected'])->default('Requested');
            $table->enum('status_owner', ['Requested', 'Accepted', 'Rejected'])->default('Requested');
            $table->string('reason')->default("");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
