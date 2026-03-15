<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CarRent</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .navbar-custom { background: white; border-bottom: 1px solid #dee2e6; padding: 15px 0; }
        .logo-text { color: #007bff; font-weight: 700; font-size: 1.6rem; text-decoration: none; }
        .nav-links a { color: #6c757d; text-decoration: none; font-weight: 500; transition: 0.3s; }
        .nav-links a:hover { color: #007bff; }
    </style>
</head>
<body>

    <nav class="navbar-custom mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('cars.index') }}" class="logo-text">CarRent</a>

            <div class="nav-links d-flex align-items-center gap-3">
                @guest
                    <a href="{{ route('login') }}">Увійти</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-sm">Реєстрація</a>
                @endguest

                @auth
                    <span class="text-muted">Привіт, <strong>{{ Auth::user()->name }}</strong></span>
                    
                    @if(Auth::user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm">Адмінка</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-link text-danger p-0 m-0 text-decoration-none">Вихід</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>