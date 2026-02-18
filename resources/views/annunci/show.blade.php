@include


@extends('layouts.guest')

@section('content')


    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="https://picsum.photos/600/400" class="img-fluid rounded shadow" alt="immagine segnaposto">
            </div>
            <div class="col-12 col-md-6">
                <h1>{{ $annuncio->titolo }}</h1>
                <p class="text-muted">Pubblicato il: {{ $annuncio->created_at->format('d/m/Y') }}</p>
                <hr>
                <h3>{{ $annuncio->prezzo }} €</h3>
                <p>{{ $annuncio->descrizione }}</p>
                <p><strong>Città:</strong> {{ $annuncio->citta }}</p>
                <p><strong>Categoria:</strong> {{ $annuncio->categoria }}</p>
                <a href="{{ route('annunci.index') }}" class="btn btn-outline-secondary">Torna indietro</a>
            </div>
        </div>
    </div>
<p>{{ $annuncio->descrizione }}</p>

@endsection
