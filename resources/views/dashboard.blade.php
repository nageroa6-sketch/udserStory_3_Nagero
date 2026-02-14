<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="navbar">
<div class="container">
<a href="/" class="logo">⚡ Presto.it</a>
<span style="float:right;color:white">Anita</span>
</div>
</div>

<div class="container">
<h1 class="title">Revisore</h1>

@if($annuncio??false)
<div class="card">
<h3>{{ $annuncio->titolo }}</h3>
<p>{{ Str::limit($annuncio->descrizione, 100) }}</p>

<div class="stats">
<div><i class="fas fa-euro-sign"></i>€{{ $annuncio->prezzo }}</div>
<div><i class="fas fa-map-marker-alt"></i>{{ $annuncio->citta }}</div>
<div><i class="fas fa-tag"></i>{{ $annuncio->categoria }}</div>
</div>

<form method="POST" action="/revisor/{{ $annuncio->id }}/reject">@csrf@method('DELETE')
<button class="btn btn-danger">❌</button>
</form>
<form method="POST" action="/revisor/{{ $annuncio->id }}/accept">@csrf@method('PATCH')
<button class="btn btn-success">✅</button>
</form>
@else
<div style="text-align:center;color:white">
<i class="fas fa-check" style="font-size:80px;color:#28a745"></i><br>
<span style="font-size:24px">OK!</span>
@endif
</div>
</body>
</html>
