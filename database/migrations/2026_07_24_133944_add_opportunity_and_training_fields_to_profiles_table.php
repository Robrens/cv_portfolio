<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('opportunity_title')->nullable();
            $table->string('opportunity_description')->nullable();
            $table->string('training_title')->nullable();
            $table->string('training_description')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn([
                'opportunity_title',
                'opportunity_description',
                'training_title',
                'training_description',
            ]);
        });
    }
};
