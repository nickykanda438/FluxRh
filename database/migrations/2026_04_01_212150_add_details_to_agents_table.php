<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('agents', function (Blueprint $table) {
            $fields = [
                'categorie_grade' => ['type' => 'string'],
                'date_naissance'  => ['type' => 'date'],
                'lieu_naissance'  => ['type' => 'string'],
                'etat_civil'      => ['type' => 'string'],
                'genre'           => ['type' => 'char', 'length' => 1],
                'telephone'       => ['type' => 'string'],
                'email'           => ['type' => 'string'],
                'adresse'         => ['type' => 'text'],
                'nbre_enfant'     => ['type' => 'integer', 'default' => 0],
                'niveau_etude'    => ['type' => 'string'],
                'domaine_etude'   => ['type' => 'string'],
                'annee_obtention' => ['type' => 'string'],
                'nom_institution' => ['type' => 'string'],
                'pays_etude'      => ['type' => 'string'],
                'province'        => ['type' => 'string'],
                'ville'           => ['type' => 'string'],
                'coordination'    => ['type' => 'string'],
                'unite'           => ['type' => 'string'],
                'departement'     => ['type' => 'string'],
                'division_nom'    => ['type' => 'string'],
                'position'        => ['type' => 'string'],
                'date_embauche'   => ['type' => 'date'],
                'commission_affectation' => ['type' => 'string'],
                'arrete'          => ['type' => 'string'],
                'remuneration'    => ['type' => 'decimal', 'p' => 15, 's' => 2],
                'nature_acte'     => ['type' => 'string'],
            ];

            foreach ($fields as $name => $config) {
                if (!Schema::hasColumn('agents', $name)) {
                    $type = $config['type'];
                    if ($type === 'string') $table->string($name)->nullable();
                    elseif ($type === 'date') $table->date($name)->nullable();
                    elseif ($type === 'char') $table->char($name, $config['length'])->nullable();
                    elseif ($type === 'text') $table->text($name)->nullable();
                    elseif ($type === 'integer') $table->integer($name)->default($config['default']);
                    elseif ($type === 'decimal') $table->decimal($name, $config['p'], $config['s'])->nullable();
                }
            }
        });
    }

    public function down(): void
    {
        Schema::table('agents', function (Blueprint $table) {
            $table->dropColumn([
                'categorie_grade', 'date_naissance', 'lieu_naissance', 'etat_civil', 
                'genre', 'telephone', 'email', 'adresse', 'nbre_enfant', 
                'niveau_etude', 'domaine_etude', 'annee_obtention', 'nom_institution', 
                'pays_etude', 'province', 'ville', 'coordination', 'unite', 
                'departement', 'division_nom', 'position', 'date_embauche', 
                'commission_affectation', 'arrete', 'remuneration', 'nature_acte'
            ]);
        });
    }
};