<?php

namespace App\Http\Controllers;

use App\Models\Annuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevisorController extends Controller
{
    public function index()
    {
        $annuncio = Annuncio::inAttesa()->first();
        return view('revisor.dashboard', compact('annuncio'));
    }

    public function accept(Annuncio $annuncio)
    {
        if ($annuncio->stato !== 'in_attesa') {
            return back()->with('error', 'Annuncio non valido');
        }
        $annuncio->accept();
        return redirect()->route('revisor.dashboard')->with('success', 'Annuncio APPROVATO');
    }

    public function reject(Annuncio $annuncio)
    {
        if ($annuncio->stato !== 'in_attesa') {
            return back()->with('error', 'Annuncio non valido');
        }
        $annuncio->reject();
        return redirect()->route('revisor.dashboard')->with('success', 'Annuncio RIFIUTATO');
    }

    public function undo()
    {
        Annuncio::undoLastAction();  // ← CORRETTO
        return redirect()->route('revisor.dashboard')->with('info', 'Azione ANNULLATA');
    }
}
