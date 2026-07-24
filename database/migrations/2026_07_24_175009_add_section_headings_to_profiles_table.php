<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('skills_eyebrow')->nullable();
            $table->string('skills_title')->nullable();

            $table->string('career_eyebrow')->nullable();
            $table->string('career_title')->nullable();

            $table->string('approach_eyebrow')->nullable();
            $table->string('approach_title')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn([
                'skills_eyebrow',
                'skills_title',
                'career_eyebrow',
                'career_title',
                'approach_eyebrow',
                'approach_title',
            ]);
        });
    }
};
