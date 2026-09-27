<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organization_structures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('organization_structures')->nullOnDelete();
            $table->string('name');
            $table->string('position')->nullable();
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('generation')->default(0);
            $table->unsignedInteger('order_column')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organization_structures');
    }
};