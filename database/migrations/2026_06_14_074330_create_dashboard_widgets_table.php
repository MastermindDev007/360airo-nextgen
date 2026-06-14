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
        Schema::create('dashboard_widgets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('widget_key');
            $table->integer('x')->default(0);
            $table->integer('y')->default(0);
            $table->integer('w')->default(1);
            $table->integer('h')->default(1);
            $table->timestamps();
            
            // Allow multiple users to save layouts independently
            $table->unique(['user_id', 'widget_key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_widgets');
    }
};
