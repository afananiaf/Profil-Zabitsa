<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('figures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('role')->nullable();
            $table->string('category')->default('umum');
            $table->text('short_bio')->nullable();
            $table->longText('bio')->nullable();
            $table->longText('education')->nullable();
            $table->longText('journey')->nullable();
            $table->longText('contributions')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedInteger('order_column')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('figures');
    }
};