<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('education_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_name')->nullable();
            $table->string('icon')->nullable();
            $table->text('description')->nullable();
            $table->longText('overview')->nullable();
            $table->longText('objectives')->nullable();
            $table->longText('curriculum')->nullable();
            $table->longText('programs')->nullable();
            $table->longText('activities')->nullable();
            $table->longText('info')->nullable();
            $table->unsignedInteger('order_column')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('education_levels');
    }
};