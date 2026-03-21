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
        Schema::create('transferts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained();
            $table->foreignId('bureau_id')->constrained();
            $table->date('date_transfert');
            $table->string('motif')->nullable();
            $table->string('reference_acte')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transferts');
    }
};