<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            // Identity
            $table->string('first_name');
            $table->string('last_name');
            $table->string('job_title');

            // Hero
            $table->string('hero_eyebrow')->nullable();
            $table->string('hero_title_before');
            $table->string('hero_title_primary_highlight');
            $table->string('hero_title_middle')->nullable();
            $table->string('hero_title_secondary_highlight');
            $table->string('hero_title_after')->nullable();
            $table->text('hero_description');

            // "About" section
            $table->string('about_eyebrow')->default('À propos');
            $table->string('about_title');
            $table->text('about_description');
            $table->text('about_secondary_description')->nullable();

            // General informations
            $table->string('location')->nullable();
            $table->string('availability')->nullable();
            $table->string('email')->nullable();

            // CV file path
            $table->string('resume_path')->nullable();

            // contact CTA
            $table->string('contact_title')->nullable();
            $table->text('contact_description')->nullable();
            $table->string('contact_button_label')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
