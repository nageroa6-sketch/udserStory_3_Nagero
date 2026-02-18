{{-- richiesta reestet psw --}}





<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <button type="submit">Invia Link di Reset</button>
</form>