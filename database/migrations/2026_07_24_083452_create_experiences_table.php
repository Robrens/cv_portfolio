<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();

            // Principal informations
            $table->string('job_title');
            $table->string('company_name')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('location')->nullable();
            $table->string('company_url')->nullable();

            // Period
            $table->unsignedSmallInteger('start_year');
            $table->unsignedTinyInteger('start_month')->nullable();
            $table->unsignedSmallInteger('end_year')->nullable();
            $table->unsignedTinyInteger('end_month')->nullable();
            $table->boolean('is_current')->default(false);

            // Card content
            $table->text('summary');

            // experiences details
            $table->text('details')->nullable();
            $table->json('responsibilities')->nullable();
            $table->json('achievements')->nullable();

            // technologies badges
            $table->json('technologies')->nullable();

            // Display gestion
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
