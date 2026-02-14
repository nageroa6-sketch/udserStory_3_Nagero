<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('user:make-revisor {email}', function (string $email) {
    $user = \App\Models\User::where('email', $email)->first();

    if (!$user) {
        $this->error('❌ Utente non trovato');
        return 1;
    }

    if ($user->is_revisor) {
        $this->warn('⚠️ Utente già revisore');
        return 0;
    }

    $user->is_revisor = true;
    $user->save();

    $this->info("✅ {$user->name} è ora REVISORE Presto.it!");
})->purpose('Promuove un utente a revisore');
