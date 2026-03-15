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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            // Informations d'identification
            $table->string('matricule')->unique();
            $table->string('categorie_grade');
            $table->string('nom');
            $table->string('prenom');
            $table->string('postnom')->nullable();

            // État civil et naissance
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->string('etat_civil');
            $table->char('genre', 1); // M ou F

            // Contact
            $table->string('telephone');
            $table->string('email')->unique();
            $table->text('adresse');

            // Famille et Études
            $table->integer('nombre_enfants')->default(0);
            $table->string('niveau_etude');
            $table->string('domaine_etude');
            $table->year('annee_obtention');
            $table->string('nom_institution');

            // Géographie et Documents
            $table->string('pays');
            $table->string('province');
            $table->string('ville');
            $table->string('document_formation')->nullable(); // Chemin vers le fichier
            $table->string('reference_document')->nullable();
            $table->date('date_obtention_document')->nullable();

            // Carrière professionnelle
            $table->string('departement');
            $table->string('position');
            $table->date('date_embauche');
            $table->string('coordination')->nullable();
            $table->string('division')->nullable();
            $table->string('bureau')->nullable();
            $table->string('unite')->nullable();

            // Administratif et Paie
            $table->string('commission_affectation')->nullable();
            $table->string('arrete_nomination')->nullable();
            $table->boolean('remuneration')->default(false);
            $table->boolean('carte_biometrique')->default(false);
            $table->string('nature_acte')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
