{{-- layout per pagine pubbliche non autenticate --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
   @vite[('resources/css/app.css', 'resouces/js/app.js')]
   
   
    <title>Document</title>




</head>
<body class="bg-gray-50 min-h-screen">
    @include('components.navbar')   <!-- stessa navbar, ma gestisce guest/auth -->

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-6 mt-auto text-center">
        <p>© {{ date('Y') }} Presto – Annunci revisionati</p>
    </footer>
</body>
    
</body>
</html>