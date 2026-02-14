<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidaturaController extends Controller
{
    class RevisoreController extends Controller {
    public function __construct() {
        $this->middleware('revisor');
    }

    public function dashboard() {
        $annuncio = Annuncio::inAttesa()->first();
        $stats = [...];
        return view('revisore.dashboard', compact('annuncio', 'stats'));
    }

    public function approva(Annuncio $annuncio) {
        $annuncio->update([
            'stato' => 'approvato',
            'revisore_email' => auth()->user()->email,
            'data_revisione' => now()
        ]);
        session(['last_action' => ['id' => $annuncio->id, 'stato' => 'in_attesa']]);
        return back()->with('success', 'Approvato');
    }

    public function rifiuta(Annuncio $annuncio) {
        $annuncio->update(['stato' => 'rifiutato', ...]);
        session(['last_action' => ['id' => $annuncio->id, 'stato' => 'in_attesa']]);
        return back()->with('success', 'Rifiutato');
    }

    public function undo() {
        $last = session('last_action');
        if ($last) {
            Annuncio::find($last['id'])->update(['stato' => 'in_attesa', 'revisore_email' => null]);
            session()->forget('last_action');
        }
        return back();
    }
}
}
