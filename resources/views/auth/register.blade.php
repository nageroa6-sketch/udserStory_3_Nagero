









@include( 'login')



<form method="POST" action="{{ route('register') }}">
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    
    <label for="password_confirmation">Conferma Password:</label>
    <input type="password" name="password_confirmation" required>

    <button type="submit">Registrati</button>
</form>