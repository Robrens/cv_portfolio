<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daily_visitors', function (Blueprint $table): void {
            $table->id();
            $table->date('visited_on');
            $table->string('fingerprint', 64);
            $table->timestamps();

            $table->unique(
                ['visited_on', 'fingerprint'],
                'daily_visitors_date_fingerprint_unique',
            );

            $table->index('created_at');
        });

        Schema::create('daily_visit_statistics', function (Blueprint $table): void {
            $table->id();
            $table->date('visited_on')->unique();
            $table->unsignedInteger('unique_visitors')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daily_visit_statistics');
        Schema::dropIfExists('daily_visitors');
    }
};
