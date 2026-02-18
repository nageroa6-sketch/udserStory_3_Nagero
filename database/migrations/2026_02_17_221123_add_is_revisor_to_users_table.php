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
        Schema::table('users', function (Blueprint $table) {
            // Aggiungi la colonna is_revisor
            $table->boolean('is_revisor')->default(false)->after('password');
            // Oppure: $table->string('role')->default('user')->after('password');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Rimuovi la colonna is_revisor
            $table->dropColumn('is_revisor');
            // Se hai aggiunto la colonna role, rimuovila con: $table->dropColumn('role');
        });
    }
};