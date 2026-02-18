<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <div class="bg-white rounded-lg shadow hover:shadow-md transition overflow-hidden">
    <div class="h-48 bg-gray-200 flex items-center justify-center">
        @if($annuncio->immagine ?? false)
            <img src="{{ asset('storage/' . $annuncio->immagine) }}" alt="{{ $annuncio->titolo }}" class="object-cover w-full h-full">
        @else
            <span class="text-gray-400">No foto</span>
        @endif
    </div>
    <div class="p-4">
        <h3 class="font-semibold text-lg mb-1 line-clamp-2">{{ $annuncio->titolo }}</h3>
        <p class="text-xl font-bold text-blue-600">{{ number_format($annuncio->prezzo, 0, ',', '.') }} €</p>
        <p class="text-sm text-gray-500 mt-1">{{ $annuncio->citta ?? '—' }}</p>
    </div>
</div>  
</body>
</html>