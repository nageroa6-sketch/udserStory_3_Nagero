{{-- <!DOCTYPE html>
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
</html> --}}
<x-guest-layout>
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-3 fw-bold text-white mb-3">⚡ Presto.it</h1>
            <p class="lead text-white fs-2">Piattaforma #1 Annunci</p>
        </div>

        <!-- CAROUSEL RICERCA -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <div id="searchCarousel" class="carousel slide shadow-lg rounded-4" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card border-0 bg-white p-5 rounded-4">
                                <div class="row align-items-center">
                                    <div class="col-md-3 text-center">
                                        <i class="fas fa-search fa-3x text-primary mb-3"></i>
                                        <h3 class="fw-bold">Cosa cerchi?</h3>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-lg rounded-4 shadow" placeholder="iPhone, Auto...">
                                            </div>
                                            <div class="col-4">
                                                <button class="btn btn-primary btn-lg w-100 rounded-4 shadow-lg">CERCA</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card border-0 bg-white p-5 rounded-4">
                                <div class="row align-items-center">
                                    <div class="col-md-3 text-center">
                                        <i class="fas fa-map-marker-alt fa-3x text-success mb-3"></i>
                                        <h3 class="fw-bold">Quale città?</h3>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-lg rounded-4 shadow" placeholder="Roma, Milano...">
                                            </div>
                                            <div class="col-4">
                                                <button class="btn btn-success btn-lg w-100 rounded-4 shadow-lg">TROVA</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#searchCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#searchCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </div>

        @guest
        <!-- FORM LOGIN -->
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card border-0 shadow-lg rounded-5 bg-white">
                    <div class="card-body p-5">
                        <h2 class="text-center fw-bold text-dark mb-4">ACCEDI</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-4">
                                <input type="email" name="email" class="form-control form-control-lg rounded-4 shadow-sm border-0 py-3 px-4" placeholder="Email" required>
                            </div>
                            <div class="mb-4">
                                <input type="password" name="password" class="form-control form-control-lg rounded-4 shadow-sm border-0 py-3 px-4" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-4 py-3 fw-bold shadow-lg">ACCEDI</button>
                        </form>
                        <div class="text-center mt-4">
                            <a href="{{ route('register') }}" class="text-primary fw-bold">Non hai account? Registrati</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endguest
    </div>
</x-guest-layout>
