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
        Schema::create('entrepreneur_profiles', function (Blueprint $table) {
            $table->id();

            // Información personal
            $table->string('phone', 20);
            $table->date('birth_date')->nullable();
            $table->string('profile_photo')->nullable();

            // Información del negocio
            $table->string('business_name');
            $table->string('business_type')->nullable();
            $table->string('address');

            $table->text('description')->nullable();

            $table->foreignId('department_id')
                ->constrained('departments')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('municipality_id')
                ->constrained('municipalities')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('user_id')
                ->unique()
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrepreneur_profiles');
    }
};