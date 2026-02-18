<nav class="bg-white shadow">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <a href="{{ route('welcome') }}" class="text-2xl font-bold text-blue-700">Presto</a>

            <div class="flex items-center space-x-6">
                <a href="{{ route('annunci.index') }}" class="text-gray-700 hover:text-blue-600">Annunci</a>

                @guest
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Accedi</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Registrati</a>
                @endguest

                @auth
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600">Dashboard</a>

                    @if(auth()->user()->is_revisor ?? false)
                        <a href="{{ route('revisor.index') }}" class="relative text-gray-700 hover:text-blue-600">
                            Revisione
                            @if($count = \App\Models\Annuncio::toBeRevisedCount())
                                <span class="absolute -top-1 -right-2 bg-red-500 text-white text-xs rounded-full px-2 py-0.5">
                                    {{ $count }}
                                </span>
                            @endif
                        </a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-red-600">Esci</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>