@extends('layouts.guest')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row g-0 bg-body-secondary position-relative">
        <div class="col-md-6 mb-md-0 p-md-4">
            <img src="..." class="w-100" alt="...">
        </div>
        <div class="col-md-6 p-4 ps-md-0">
            <h5 class="mt-0">Guarda tra annunci e articoli il migliore per te</h5>
            <p>Un altro benvenuto.</p>
            <a href="#" class="stretched-link">Go somewhere</a>
        </div>
    </div>

    @if(session('message'))
        <div class="alert alert-warning mt-4">{{ session('message') }}</div>
    @endif

    <div class="mt-4">
        <h3>Articoli in attesa di revisione</h3>
        
        @if($articles->isEmpty())
            <div class="alert alert-info">Nessun articolo in attesa.</div>
        @else
            @foreach($articles as $article)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->content }}</p>

                        <form method="POST" action="{{ route('articles.accept', $article->id) }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success">Accetta</button>
                        </form>

                        <form method="POST" action="{{ route('articles.reject', $article->id) }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger">Rifiuta</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</x-app-layout>