

@include()

{{-- Pagina Interfaccia per Pablo per mostrare annunci / tutti gli articoli a revisionare --}}




{{-- estende il layout del revisor --}}

@extends('layouts.revisor')  
@section('content')








    <div class="container my-5">

        <h1 class="mb-4">Area Revisore</h1>



        {{-- Strutture di controllo @if --}}

        @if (session('status'))


            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif




        @if ($articles_to_check->count())

            @foreach ($articles_to_check as $article)

                <div class="card shadow mb-4">
                    <div class="card-header">


                        <h3>{{ $article->title }}</h3>
                        <small>Di {{ $article->user?->name ?? 'Utente sconosciuto' }}</small>
                    </div>



                        <div class="card-body">
                            <p>{{ $article->body }}</p>
                            @if ($article->img)
                                <img src="{{ Storage::url($article->img) }}" alt="Immagine annuncio" class="img-fluid mb-3">
                                @endif
                      
                           {{-- @include un altro file blade al interno del modello con istanza article (oggetto)-modello di dato-i --}}
                           
                            @include('revisor.components.buttons-action', ['article' => $article])
                        </div>
                    </div>


                        @endforeach


                    @else



            <div class="alert alert-info text-center">



                <h4>Nessun annuncio in attesa di revisione </h4>





            </div>


         @endif

    </div>

@endsection




















@endsection