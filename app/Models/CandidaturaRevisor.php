<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidaturaRevisor extends Model
{
    class CandidaturaRevisore extends Model {
    protected $table = 'candidature_revisore';
    protected $fillable = ['nome_completo','email','telefono','motivazione','disponibilita_ore','stato'];
}
3. Controllori ( app/Http/Controllers/)
// AnnuncioController.php
class AnnuncioController extends Controller {
    public function index() {
        $annunci = Annuncio::approvati()->latest()->paginate(12);
        return view('annunci.index', compact('annunci'));
    }

    public function show(Annuncio $annuncio) {
        return view('annunci.show', compact('annuncio'));
    }

    public function create() {
        return view('annunci.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([...]);
        $validated['user_id'] = auth()->id();
        $validated['stato'] = 'in_attesa';
        Annuncio::create($validated);
        return redirect()->route('home')->with('success', 'Annuncio inviato per revisione');
    }
}
}
