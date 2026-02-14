<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('annunci', function (Blueprint $table) {
            $table->id();
$table->string('titolo');
$table->text('descrizione');
$table->enum('categoria', ['elettronica', 'casa', 'auto-moto', 'abbgliamento', 'film', 'libri','altro']);
$table->decimal('prezzo',10,2);
$table->string('città');
   $table->enum('stato', ['in_attesa','approvato','rifiutato'])->default('in_attesa');
    $table->string('revisore_email')->nullable();
    $table->timestamp('data_revisione')->nullable();
    $table->string('contatto_email')->nullable();
    $table->string('contatto_telefono')->nullable();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annunci');
    }
};
