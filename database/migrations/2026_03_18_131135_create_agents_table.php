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
            $table->foreignId('bureau_id')->constrained('bureau');
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
