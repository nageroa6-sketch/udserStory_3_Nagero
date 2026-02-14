<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
       Schema::create('annunci', function (Blueprint $table) {
            $table->id();
            $table->string('titolo');
            $table->text('descrizione');
            $table->decimal('prezzo', 8, 2);
            $table->string('citta');
            $table->string('categoria');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('stato')->default('in_attesa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('annunci');
    }
};
