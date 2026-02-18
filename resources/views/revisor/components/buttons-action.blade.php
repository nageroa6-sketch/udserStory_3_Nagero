<form action="{{ route('revisor.accept_article', $article) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-success">
        Accetta
    </button>
</form>

<form action="{{ route('revisor.reject_article', $article) }}" method="POST" class="d-inline ms-2">
    @csrf
    <button type="submit" class="btn btn-danger">
        Rifiuta
    </button>
</form>