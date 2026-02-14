<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<title>Presto.it</title>
</head>
<body style="background:#667eea;color:white;font-family:Arial;padding:50px">
<h1 style="font-size:60px;text-align:center">⚡ Presto.it</h1>
<p style="font-size:24px;text-align:center;margin-bottom:50px">Piattaforma #1 Annunci</p>

<div style="max-width:400px;margin:0 auto;background:white;color:black;padding:30px;border-radius:15px">
<h2 style="text-align:center;margin-bottom:30px">Login</h2>
<form method="POST" action="{{ route('login') }}">
@csrf
<input type="email" name="email" placeholder="Email" style="width:100%;padding:15px;margin:10px 0;border:1px solid #ddd;border-radius:8px" required>
<input type="password" name="password" placeholder="Password" style="width:100%;padding:15px;margin:10px 0;border:1px solid #ddd;border-radius:8px" required>
<button type="submit" style="width:100%;background:#007bff;color:white;padding:15px;border:none;border-radius:8px;font-size:18px;cursor:pointer">ACCEDI</button>
</form>

<div style="text-align:center;margin:20px 0">
<a href="{{ route('register') }}" style="color:#007bff;text-decoration:none">Non hai account? Registrati</a>
</div>
</div>
</body>
</html>
