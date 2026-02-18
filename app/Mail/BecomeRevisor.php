

<!-- vista mail = per richiesta revisore . Pagina BecomeRevisor, da qui, 
 secondo logica file.  -->


<x-layout>



    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card shadow p-4">



                    <h1 class="text-center mb-4">Lavora con noi</h1>




                    <p class="text-center"> Compila il modulo per candidarti come revisore del portale.</p>
                    
                    <form action="{{ route('revisor.submit') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nome_completo" class="form-label">Nome Completo</label>
                            <input type="text" name="nome_completo" class="form-control" id="nome_completo" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Indirizzo Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" name="telefono" class="form-control" id="telefono">
                        </div>

                        <div class="mb-3">
                            <label for="disponibilita_ore" class="form-label">Quante ore puoi dedicare a settimana?</label>
                            <input type="number" name="disponibilita_ore" class="form-control" id="disponibilita_ore" min="1" max="40">
                        </div>

                        <div class="mb-3">
                            <label for="motivazione" class="form-label">Perché vuoi diventare revisore?</label>
                            <textarea name="motivazione" id="motivazione" cols="30" rows="5" class="form-control" placeholder="Raccontaci la tua esperienza..."></textarea>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning fw-bold shadow">Invia Candidatura</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>