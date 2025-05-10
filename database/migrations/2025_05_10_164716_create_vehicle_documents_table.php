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
    Schema::create('vehicle_documents', function (Blueprint $table) {
        $table->id();
        $table->foreignId('document_type_id')->constrained('document_types')->onDelete('cascade'); // Relación con document_types
        $table->date('expedition_date'); // Fecha de expedición
        $table->date('expiration_date'); // Fecha de expiración
        $table->string('issuing_entity'); // Entidad emisora
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_documents');
    }
};
