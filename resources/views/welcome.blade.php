

{{-- Questa la welcome, pagina che tengo come Prima View in ogni caso. --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    


<x-navbar />


<h1>Benvenuta Anita</h1>
</header>

    <section class="hero">
        <div class="container">
            <h1>Trova l'affare giusto vicino a te</h1>
            <p style="font-size: clamp(1.1rem, 3vw, 1.3rem); max-width: 600px; margin: 1.25rem auto; color: #4b5563;">
                Migliaia di annunci revisionati – privati e negozi
            </p>

            <form action="{{ route('annunci.index') }}" method="GET">
                <div class="search-wrapper">
                    <input 
                        type="text" 
                        name="cerca" 
                        placeholder="Cosa cerchi? (es. iPhone, divano, bici...)" 
                        required
                    >
                    <button type="submit">Cerca ora</button>
                </div>
            </form>
        </div>
    </section>

    <section class="featured">
        <div class="container">
            <h2 class="text-center mb-8">Annunci più recenti</h2>

            @if($annunci->isEmpty())
                <p class="text-center py-16 text-gray-600 text-lg">
                    Al momento non ci sono annunci in evidenza...
                </p>
            @else
                <div class="annunci-grid">
                    @foreach($annunci as $annuncio)
                        <a href="{{ route('annunci.show', $annuncio) }}" class="annuncio-card">
                            <div class="img-container">
                                @if($annuncio->immagine ?? false)
                                    <img src="{{ asset('storage/' . $annuncio->immagine) }}" alt="{{ $annuncio->titolo }}">
                                @else
                                    <span style="color:#9ca3af; font-size:1.1rem;">Nessuna foto</span>
                                @endif
                            </div>
                            <div class="content">
                                <h3 style="margin-bottom:0.5rem; line-height:1.3; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">
                                    {{ $annuncio->titolo }}
                                </h3>
                                <div class="price">
                                    {{ number_format($annuncio->prezzo, 0, ',', '.') }} €
                                </div>
                                <div style="font-size:0.95rem; color:#6b7280; margin-top:0.25rem;">
                                    {{ $annuncio->citta ?? 'Italia' }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="text-center mt-10">
                    <a href="{{ route('annunci.index') }}" 
                       style="display:inline-block; background:#1f2937; color:white; padding:1rem 2rem; border-radius:0.5rem; font-weight:600; text-decoration:none;">
                        Vedi tutti gli annunci →
                    </a>
                </div>
            @endif
        </div>
    </section>


    
<p>Annunci Controllati dai revisori</p>

            </p>
        </div>
    </footer>



{{-- Annunci approvati --}}



 



</body>
</html>

 