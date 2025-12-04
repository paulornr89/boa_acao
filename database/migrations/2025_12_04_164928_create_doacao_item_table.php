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
        Schema::create('doacao_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doacao_id')->constrained('doacoes')->onDelete('cascade');
            $table->foreignId('item_id')->constrained('itens')->onDelete('cascade');
            $table->integer('quantidade');
            $table->timestamps();
            $table->unique(['doacao_id', 'item_id']);//o mesmo item não pode aparecer na mesma doacao
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doacao_item');
    }
};
