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
        Schema::create('panierClients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('element_id');
            $table->unsignedBigInteger('table_id');
            $table->real('montant');
            $table->integer('quantite');
            $table->timestamps();
            $table->foreign('element_id')->references('id')->on('elements');
            $table->foreign('table_id')->references('id')->on('tables');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panierClients');
    }
};
