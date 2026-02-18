{{-- layout principale (con navbar, footer) --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    
    <title>@yield('title', 'Presto – Annunci')</title>





</head>




<body class="bg-gray-50 min-h-screen flex flex-col">

    @include('components.navbar')

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-6 mt-auto">
        <div class="container mx-auto px-4 text-center">
            <p>© {{ date('Y') }} Presto – Annunci revisionati</p>
        </div>
    </footer>

 {{-- Messaggi Flash di Esempio --}}



 @if (session('success'))
        <div class="fixed bottom-4 right-4 bg-green-600 text-white px-6 py-3 rounded shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="fixed bottom-4 right-4 bg-red-600 text-white px-6 py-3 rounded shadow-lg z-50">
            {{ session('error') }}
        </div>
    @endif







</body>
</html>