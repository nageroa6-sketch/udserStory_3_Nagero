
<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1 class="mb-4">Inserisci un nuovo Annuncio</h1>
                <form action="#" method="POST" class="p-5 shadow border rounded bg-light">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Titolo</label>
                        <input type="text" name="titolo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrizione</label>
                        <textarea name="descrizione" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Prezzo</label>
                            <input type="number" step="0.01" name="prezzo" class="form-control">
                        </div>
                        <div class="col">
                            <label class="form-label">Città</label>
                            <input type="text" name="citta" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-4">Invia Annuncio</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>