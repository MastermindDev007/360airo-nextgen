<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workspace_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('status')->default('draft'); // draft, active, paused, completed
            $table->json('settings')->nullable(); // tracking, schedule, etc.
            $table->integer('total_prospects')->default(0);
            $table->integer('emails_sent')->default(0);
            $table->integer('opens')->default(0);
            $table->integer('replies')->default(0);
            $table->integer('bounces')->default(0);
            $table->timestamp('started_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
