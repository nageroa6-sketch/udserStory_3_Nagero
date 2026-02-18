<?php

namespace App\Console\Commands;



use Illuminate\Console\Command;
use App\Models\User;

class MakeUserRevisor extends Command
{
    /**
     * DEFINIRE COMANDO- COMANDO IMPORTA LE CLASSI NECESSARIE
     *
     * @var string
     */
    protected $signature = 'app:make-user-revisor {email}';

    /**
     * rende un utente tramite email Revisor.
     *
     * @var string
     */
    protected $description = 'Rende revisor un utente tramite email';


//il metodo handle()

    /**
     * S'inserisce la logica DEL COMANDO=>Recupera email  cerca Utente nel DB.
     */
    public function handle()
    {
        $email = $this->argument('email');

        $user = User::where('email', $email)->first();


// Controlle dell'esistenza dell'utente

        if (!$user) {
            $this->error("Nessun utente trovato con email: $email");
            return;
        }


//Se l'utente non esiste, stampa un messaggio di errore e termina l'esecuzione.
//Impostazione del Ruolo di Revisor:
        $user->is_revisor = true;
        $user->save();

        $this->info("L'utente {$user->email} è ora un revisor!");

//Se l'utente esiste, imposta il campo is_revisor a true, salva le modifiche e stampa un messaggio di conferma.

    }
    }
