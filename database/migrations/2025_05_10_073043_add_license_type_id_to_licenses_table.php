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
        $table->foreignId('license_type_id')->nullable()->constrained('license_types')->onDelete('set null');
        $table->dropColumn('type_of_license'); // Eliminar el campo antiguo
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('licenses', function (Blueprint $table) {
            //
        });
    }
};
