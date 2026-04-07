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
            $table->string('matricule')->unique();
            $table->string('categorie_grade');
            $table->string('nom');
            $table->string('prenom');
            $table->string('postnom')->nullable();
            $table->enum('genre', ['M', 'F']);
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->string('etat_civil');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->integer('nbre_enfant')->default(0);
            $table->string('niveau_etude');
            $table->string('domaine_etude');
            $table->integer('annee_obtention')->nullable();
            $table->string('nom_institution')->nullable();
            $table->string('pays')->nullable();
            $table->string('province');
            $table->string('ville');
            $table->string('coordination')->nullable();
            $table->string('unite')->nullable();
            $table->string('departement')->nullable();
            $table->integer('renumeration')->nullable();
            $table->string('adresse')->nullable();
            $table->foreignId('division_id')->constrained('divisions')->onDelete('cascade');
            $table->foreignId('bureau_id')->constrained('bureaus')->onDelete('cascade');
            $table->enum('status', ['actif', 'deserteur', 'decede', 'retraite'])->default('actif');
            $table->timestamps();
            $table->softDeletes(); 
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