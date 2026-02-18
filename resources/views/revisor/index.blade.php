@extends('layouts.revisor')   <!-- o app -->

@section('content')

    <div class="container my-5">

        <h1 class="mb-4">Area Revisore</h1>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if ($article)
            <div class="card shadow">
                <div class="card-header">
                    <h3>{{ $article->title }}</h3>
                    <small>Di {{ $article->user?->name ?? 'Utente sconosciuto' }}</small>
                </div>

                <div class="card-body">
                    <p>{{ $article->body }}</p>

                    @if ($article->img)
                        <img src="{{ Storage::url($article->img) }}" alt="Immagine annuncio" class="img-fluid mb-3">
                    @endif
                </div>

                <div class="card-footer d-flex justify-content-between">

                    @include('revisor.components.buttons-action', ['article' => $article])

                </div>
            </div>
        @else
            <div class="alert alert-info text-center">
                <h4>Nessun annuncio in attesa di revisione 🎉</h4>
            </div>
        @endif

    </div>

@endsection