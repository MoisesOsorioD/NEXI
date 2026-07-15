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
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('entrepreneur_profile_id')
                ->constrained('entrepreneur_profiles')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('supplier_profile_id')
                ->constrained('supplier_profiles')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique([
                'entrepreneur_profile_id',
                'supplier_profile_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }
};