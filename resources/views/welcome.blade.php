{{-- homepage principale - la pagina Pubblica --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WELCOMEPAGE</title>

{{-- link bootstrap --}}

{{-- css personale --}}

@vite(['resources/css/app.css', 'resources/js/app.js'])
{{-- scripts cdn js --}}

{{-- css minimale interno per dare avvio al sistema operativo interno della view pagina successiva- --}}



<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, -apple-system, sans-serif;
            background-color: #f8f9fa;
            color: #1f2937;
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        /* ───────────────────────────────
           TYPOGRAFIA FLUIDA (responsive)
        ─────────────────────────────── */
        h1 { font-size: clamp(2rem, 6vw, 3.5rem); }
        h2 { font-size: clamp(1.5rem, 5vw, 2.5rem); }
        h3 { font-size: clamp(1.2rem, 4vw, 1.6rem); }

        /* ───────────────────────────────
           NAVBAR
        ─────────────────────────────── */
        header {
            background: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        nav a {
            margin-left: 1.25rem;
            color: #374151;
            text-decoration: none;
            font-weight: 500;
        }

        nav a:hover {
            color: #2563eb;
        }

        /* ───────────────────────────────
           HERO
        ─────────────────────────────── */
        .hero {
            background: #eff6ff;
            padding: 4rem 1rem 5rem;
            text-align: center;
        }

        .hero form {
            max-width: 700px;
            margin: 2rem auto 0;
        }

        .search-wrapper {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .search-wrapper input {
            padding: 1rem 1.25rem;
            font-size: 1.05rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
        }

        .search-wrapper button {
            background: #2563eb;
            color: white;
            padding: 1rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
          
        }

        .search-wrapper button:hover {
            background: #1d4ed8;
        }

        /* ───────────────────────────────
           ANNUNCI GRID – MOBILE FIRST
        ─────────────────────────────── */
        .featured {
            padding: 3rem 1rem;
        }

        .annunci-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .annuncio-card {
            background: white;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .annuncio-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.15);
        }

        .annuncio-card .img-container {
            aspect-ratio: 4 / 3;
            background: #e5e7eb;
            display: grid;
            place-items: center;
        }

        .annuncio-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .annuncio-card .content {
            padding: 1.25rem;
        }

        .price {
            font-size: 1.4rem;
            font-weight: 700;
            color: #2563eb;
            margin: 0.25rem 0 0.5rem;
        }

        /* ───────────────────────────────
           MEDIA QUERIES – progressive enhancement
        ─────────────────────────────── */

        @media (min-width: 640px) {
            .search-wrapper {
                flex-direction: row;
            }

            .search-wrapper input {
                flex: 1;
            }

            .annunci-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 768px) {
            .hero {
                padding: 6rem 1rem 7rem;
            }

            .annunci-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .annunci-grid {
                grid-template-columns: repeat(4, 1fr);
            }

            .container {
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }

        @media (min-width: 1280px) {
            .annunci-grid {
                gap: 2rem;
            }
        }
    </style>
</head>
<body>

    <header>
        <div class="container nav-container">
            <h1 class="text-3xl font-bold text-blue-700">Presto</h1>
            <nav>
                <a href="{{ route('annunci.index') }}">Tutti gli annunci</a>
                @guest
                    <a href="{{ route('login') }}">Accedi</a>
                    <a href="{{ route('register') }}">Registrati</a>
                @endguest
                @auth





                    <a href="{{ route('home') }}">La mia area</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-600 hover:underline">Esci</button>
                    </form>





                @endauth
            </nav>
        </div>







        {{-- heDER --}}
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

</body>
















</html>