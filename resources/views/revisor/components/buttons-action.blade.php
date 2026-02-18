{{-- interfaccia per pablo --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
@include('revisor.components.buttons-action', ['article' => $article])

{{-- BOTTONI PER ACCETTA E RIFIUTA --}}

<form action="{{ route('revisor.accept_article', $article) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-primary">
        Accetta
    </button>
</form>

<form action="{{ route('revisor.reject_article', $article) }}" method="POST" class="d-inline ms-2">
    @csrf
    <button type="submit" class="btn btn-secondary">
        Rifiuta
    </button>
</form>


</body>
</html>
