<?php

namespace App\Http\Controllers;


//RevisorController
//Il revisore avrà bisogno di unʼarea riservata dove poter vedere gli articoli da revisionare e da qui

//ACCETTARLI O RIFIUTARLI  Il file 
// resources/views/revisor/index.blade.php deve usare la variabile corretta. 
// Assicurati che nel tuo RevisorController la variabile passata sia $article_to_check.

//PAGINA principale per la dashboard revisore

use Illuminate\Http\Request;
use App\Models\Article;

class RevisorController extends Controller
{
    public function index()
    {
        // Ottieni gli articoli da revisionare
        $articles_to_check = Article::toBeReviewed()->get(); // Cambiato da first() a get() per ottenere tutti gli articoli in attesa

        // Passa la variabile corretta alla vista
        return view('revisor.index', compact('articles_to_check'));
    }

    public function accept(Article $article)
    {
        $article->update(['is_accepted' => true]);
        return redirect()->route('revisor.index')->with('status', 'Articolo accettato');
    }

    public function reject(Article $article)
    {
        $article->update(['is_accepted' => false]);
        return redirect()->route('revisor.index')->with('status', 'Articolo rifiutato');
    }
}