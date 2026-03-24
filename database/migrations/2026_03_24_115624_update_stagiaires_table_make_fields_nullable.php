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
        Schema::table('stagiaires', function (Blueprint $table) {
            //
            // On rend agent_id nullable
            $table->foreignId('agent_id')->nullable()->change();
            // On rend aussi le service_affectation nullable si besoin
        $table->string('service_affectation')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stagiaires', function (Blueprint $table) {
            $table->foreignId('agent_id')->nullable(false)->change();
            $table->string('service_affectation')->nullable(false)->change();
        });
    }
};
