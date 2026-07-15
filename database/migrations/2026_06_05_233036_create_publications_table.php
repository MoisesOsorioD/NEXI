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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();

            // Información principal
            $table->string('name');
            $table->text('description');

            // Producto o servicio
            $table->enum('type', [
                'product',
                'service'
            ]);

            // Precio referencial
            $table->decimal('reference_price', 10, 2)->nullable();

            // Unidad de medida
            $table->string('unit_measure')->nullable();

            // Disponibilidad
            $table->boolean('is_available')->default(true);

            // Relaciones
            $table->foreignId('supplier_profile_id')
                ->constrained('supplier_profiles')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('category_id')
                ->constrained('categories')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};