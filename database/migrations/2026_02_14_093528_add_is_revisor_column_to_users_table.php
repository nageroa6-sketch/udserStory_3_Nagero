<?php





// nuova migrazione, il cui scopo sarà aggiungere alla
//già esistente tabella users una nuova colonna, chiamata is_revisor.




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


          $table->boolean('is_revisor')->default(false);
    
    
    
          });
    }

    //accetta 1 dato di tipo booleano;
// di default lʼutente non sarà revisore, quindi questa colonna sarà popolata con false

    /**
     * Inverte Migrazione.
     */
    public function down(): void


    {
        Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('is_revisor');
        });
    }
};
