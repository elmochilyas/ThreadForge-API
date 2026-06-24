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
        Schema::create('raw_contents', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('campaign_blueprint_id')
                ->constrained('campaign_blueprints')
                ->cascadeOnDelete();

            $table->longText('content');

            $table->string('status', 30)->default('pending');

            $table->timestamps();

            $table->index(['user_id', 'status']);
            $table->index(['campaign_blueprint_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raw_contents');
    }
};