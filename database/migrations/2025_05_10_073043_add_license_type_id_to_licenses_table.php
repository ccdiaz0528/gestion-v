<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('licenses', function (Blueprint $table) {
            // Agregar la nueva columna con la clave foránea
            $table->foreignId('license_type_id')->nullable()->constrained('license_types')->onDelete('set null');

            // Eliminar la columna antigua (si es necesario)
            $table->dropColumn('type_of_license');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('licenses', function (Blueprint $table) {
            // Eliminar la clave foránea
            $table->dropForeign(['license_type_id']);

            // Eliminar la columna 'license_type_id'
            $table->dropColumn('license_type_id');

            // Restaurar la columna 'type_of_license' si es necesario
            $table->string('type_of_license')->nullable(); // O el tipo de datos original
        });
    }
};
