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
        Schema::create('supplier_categories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('supplier_profile_id')
                ->constrained('supplier_profiles')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('category_id')
                ->constrained('categories')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique([
                'supplier_profile_id',
                'category_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_categories');
    }
};