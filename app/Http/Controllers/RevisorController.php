<?php

namespace App\Http\Controllers;


//RevisorController
//Il revisore avrà bisogno di unʼarea riservata
//  dove poter vedere gli articoli da revisionare 
// e da qui, accetta o rifiuta l articolo


use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


//controller per: la gestione revisione

class RevisorController extends Controller
{


    public function index()
    {

        // accetta solo articoli - da revisionare


        $articles_to_check = Article::toBeReviewed()->get(); 

        // Passa la variabile (collection) corretta ; alla vista

        
        return view('revisor.index', compact('articles_to_check'));
    }



// accetta- 1 articolo-

    public function accept(Article $article)
    {

//redirect risponde alla query locale

        $article->update(['is_accepted' => true]);
        return redirect()->route('revisor.index')->with('status', 'Articolo accettato');
    }


    public function reject(Article $article)
    {
        $article->update(['is_accepted' => false]);
        return redirect()->route('revisor.index')->with('status', 'Articolo rifiutato');
    }
}