@extends('layouts.guest')

@section('content')

<x-navbar />






    <div class="row">
        <div class="col-12">

<h1>TUTTI ANNUNCI QUI</h1>


        </div>
    </div>

    <div class=" row">
        
@foreach($annunci as $annuncio)
    <div class="card mb-4">
        <h2 class="text-xl font-bold text-red-600">{{ $annuncio->titolo }}</h2>
        <p>{{ $annuncio->descrizione }}</p>
        <a href="{{ route('annunci.show', $annuncio) }}" class="text-blue-600">Leggi di più</a>
    </div> 
</div>
@endforeach

@endsection



{{-- non ci sono annunci disponibili o si --}}


   