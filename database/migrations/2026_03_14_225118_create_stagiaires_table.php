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
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('postnom')->nullable();
            $table->char('genre', 1);
            $table->string('telephone');
            $table->string('email')->nullable();
            $table->enum('type_stagiaire', ['académique', 'professionnel']);
            $table->string('institution_provenance'); 
            $table->string('domaine_etude_ou_competence');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->enum('statut', ['encours', 'terminer'])->default('encours');
            $table->foreignId('agent_id')
                ->constrained('agents')
                ->onDelete('restrict');
            $table->string('service_affectation');
            $table->text('observation_finale')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stagiaires');
    }
};
