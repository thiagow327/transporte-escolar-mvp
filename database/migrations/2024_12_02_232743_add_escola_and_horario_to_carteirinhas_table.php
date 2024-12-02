<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('carteirinhas', function (Blueprint $table) {
            $table->string('escola')->nullable();
            $table->enum('horario', ['manha', 'tarde'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carteirinhas', function (Blueprint $table) {
            $table->dropColumn(['escola', 'horario']);
        });
    }
};
