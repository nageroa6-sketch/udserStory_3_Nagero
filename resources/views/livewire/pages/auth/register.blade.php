<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrati - Presto.it</title>
</head>
<body style="background:#667eea;color:white;font-family:Arial;padding:50px">
<div style="max-width:400px;margin:0 auto;background:white;color:black;padding:30px;border-radius:15px">
<h2 style="text-align:center;margin-bottom:30px">Registrati</h2>
<form method="POST" action="{{ route('register') }}">
@csrf
<input type="text" name="name" placeholder="Nome" style="width:100%;padding:15px;margin:10px 0;border:1px solid #ddd;border-radius:8px" required>
<input type="email" name="email" placeholder="Email" style="width:100%;padding:15px;margin:10px 0;border:1px solid #ddd;border-radius:8px" required>
<input type="password" name="password" placeholder="Password" style="width:100%;padding:15px;margin:10px 0;border:1px solid #ddd;border-radius:8px" required>
<button type="submit" style="width:100%;background:#28a745;color:white;padding:15px;border:none;border-radius:8px;font-size:18px;cursor:pointer">REGISTRATI</button>
</form>
<div style="text-align:center;margin-top:20px">
<a href="{{ route('login') }}" style="color:#007bff;text-decoration:none">Hai già account? Login</a>
</div>
</div>
</body>
</html>
