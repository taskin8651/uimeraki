<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('company')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();

            $table->string('industry')->nullable();
            $table->string('enquiry_type')->nullable();

            $table->text('message')->nullable();

            $table->string('target_lead_time')->nullable();
            $table->string('expected_annual_volume')->nullable();

            $table->boolean('nda_required')->default(0);

            $table->string('status')->default('new'); 
            // new, read, replied, closed

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};