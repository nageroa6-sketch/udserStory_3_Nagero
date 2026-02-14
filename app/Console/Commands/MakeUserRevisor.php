<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-user-revisor {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rende revisor un utente tramite email';

    /**
     * S'inserisce la logica.
     */
    public function handle()
    {
        $email = $this->argument('email');

        $user = User::where('email', $email)->first();



        if (!$user) {
            $this->error("Nessun utente trovato con email: $email");
            return;
        }




        $user->is_revisor = true;
        $user->save();

        $this->info("L'utente {$user->email} è ora un revisor!");



    }
    }
