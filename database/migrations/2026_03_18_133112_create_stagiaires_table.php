<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('postnom')->nullable();
            $table->enum('genre', ['M', 'F']);
            $table->string('telephone');
            $table->string('email')->unique();
            $table->enum('type_stage', ['academique', 'professionnel']);
            $table->string('etablissement_provenance');

            $table->string('periode_stage');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->foreignId('agent_encadreur_id')
                  ->nullable()
                  ->constrained('agents')
                  ->onDelete('set null');
            $table->foreignId('bureau_id')->constrained('bureaux');
            $table->enum('status', ['en_cours', 'termine', 'interrompu'])->default('en_cours');

            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('stagiaires');
    }
};
