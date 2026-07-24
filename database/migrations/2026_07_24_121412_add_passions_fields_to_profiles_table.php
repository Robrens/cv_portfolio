<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table): void {
            $table->string('passions_eyebrow')->nullable();
            $table->string('passions_title')->nullable();
            $table->string('passions_subtitle')->nullable();

            $table->text('passions_description')->nullable();
            $table->text('passions_secondary_description')->nullable();

            $table->string('spotify_title')->nullable();
            $table->text('spotify_description')->nullable();
            $table->string('spotify_url', 2048)->nullable();

            $table->boolean('passions_is_active')->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table): void {
            $table->dropColumn([
                'passions_eyebrow',
                'passions_title',
                'passions_subtitle',
                'passions_description',
                'passions_secondary_description',
                'spotify_title',
                'spotify_description',
                'spotify_url',
                'passions_is_active',
            ]);
        });
    }
};
