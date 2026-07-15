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
        Schema::create('supplier_profiles', function (Blueprint $table) {

    $table->id();

    // Información de la empresa
    $table->string('business_name')->nullable();
    $table->string('business_type')->nullable();

    $table->text('description')->nullable();

    // Contacto
    $table->string('phone', 20)->nullable();
    $table->string('contact_email')->nullable();

    // Ubicación
    $table->string('address')->nullable();

    // Información empresarial
    $table->year('foundation_year')->nullable();

    // Imagen de perfil o logo
    $table->string('profile_photo')->nullable();

    // Ubicación geográfica
    $table->foreignId('department_id')
        ->nullable()
        ->constrained('departments')
        ->cascadeOnUpdate()
        ->restrictOnDelete();

    $table->foreignId('municipality_id')
        ->nullable()
        ->constrained('municipalities')
        ->cascadeOnUpdate()
        ->restrictOnDelete();

    // Relación con users
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
        Schema::dropIfExists('supplier_profiles');
    }
};