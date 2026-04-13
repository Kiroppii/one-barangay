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
        Schema::create('incident_reports', function (Blueprint $table) {
           $table->id();
            // Link the report to the resident who submitted it
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            $table->string('incident_type'); // e.g., 'Fallen Tree', 'Noise Complaint'
            $table->text('description');
            $table->string('location'); // Specific purok or street
            $table->enum('status', ['Pending', 'Under Investigation', 'Resolved'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_reports');
    }
};
