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
        Schema::create('candidature_revisore', function (Blueprint $table) {
            $table->id();
                        $table->string('nome_completo');
                $table->string('email');
                $table->string('telefono')->nullable();
                $table->text('motivazione');
                $table->integer('disponibilita_ore')->default(10);
                $table->enum('stato', ['in_attesa','approvata','rifiutata'])->default('in_attesa');
                        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidature_revisore');
    }
};
