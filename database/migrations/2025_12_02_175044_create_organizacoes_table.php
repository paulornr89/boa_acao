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
        Schema::create('organizacoes', function (Blueprint $table) {
            $table->string('razao');
            $table->string('documento')->primary();
            $table->foreignId('user_id')->unique()->constrained('users')->onDelete('cascade');
            $table->string('telefone');
            $table->string('endereco');
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep');
            $table->string('documento_tipo');//pf ou pj
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizacoes');
    }
};
