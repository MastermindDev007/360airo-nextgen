<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('email_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workspace_id')->constrained()->cascadeOnDelete();
            $table->string('email_address');
            $table->string('provider')->nullable(); // gmail, outlook, custom
            $table->string('status')->default('active'); // active, disconnected, warming
            $table->boolean('warmup_enabled')->default(false);
            $table->integer('daily_limit')->default(50);
            $table->integer('emails_sent_today')->default(0);
            $table->json('smtp_settings')->nullable();
            $table->json('imap_settings')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('email_accounts');
    }
};
