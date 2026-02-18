{{-- layout specifico per area revisori (opzionale) --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Revisore Controllo</title>


@extends('layouts.revisor')

 @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body>
    




{{-- Visualizzo contenuto di 1 sezione --}}

    @yield('content')
</body>
</html>