<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_license_types_table.php

public function up()
{
    Schema::create('license_types', function (Blueprint $table) {
        $table->id();
        $table->string('code', 2)->unique(); // Ej: A1, B2
        $table->string('description');       // Ej: Motocicletas, Automóviles
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license_types');
    }
};
