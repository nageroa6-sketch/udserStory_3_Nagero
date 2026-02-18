<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Assicurati di importare Auth

class ArticleController extends Controller
{
    // Funzione per visualizzare gli articoli in attesa
    public function index()
    {
        $articles = Article::where('status', 'pending')->get();

        if ($articles->isEmpty()) {
            return view('articles.index')->with('message', 'Nessun articolo in attesa');
        }

        return view('articles.index', compact('articles'));
    }

    // Funzione per accettare un articolo
    public function acceptArticle($id)
    {
        $user = Auth::user();
        if (!$user->is_revisor) {
            return redirect()->back()->with('error', 'Non hai i permessi per accettare articoli.');
        }

        $article = Article::findOrFail($id);
        $article->status = 'accepted';
        $article->save();

        return redirect()->back()->with('success', 'Articolo accettato!');
    }

    // Funzione per rifiutare un articolo
    public function rejectArticle($id)
    {
        $article = Article::findOrFail($id);
        $article->status = 'rejected';
        $article->save();

        return redirect()->back()->with('success', 'Articolo rifiutato!');
    }

    // Funzione per contare gli articoli da revisionare
    public static function toBeRevisedCount(): int
    {
        return Article::whereNull('is_accepted')->count();
    }
}