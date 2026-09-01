<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cenius CRM</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preload" href="{{ asset('fonts/space-grotesk-500.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('fonts/space-grotesk-600.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('fonts/inter-tight-400.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('fonts/inter-tight-500.woff2') }}" as="font" type="font/woff2" crossorigin>
</head>
<body>
    <header class="top-bar">
        <div class="top-bar-inner">
            <a href="{{ route('customers.index') }}" class="logo">
                <span class="logo-mark">◆</span>
                <span class="logo-text">Cenius CRM</span>
            </a>
            <nav class="top-nav">
                <a href="{{ route('customers.index') }}" class="nav-link {{ request()->routeIs('customers.index') ? 'nav-link--active' : '' }}">
                    Customers
                </a>
                <a href="{{ route('customers.create') }}" class="btn btn--primary">
                    + New Customer
                </a>
            </nav>
        </div>
    </header>

    <main class="main-content">
        @if (session('success'))
            <div class="flash flash--success">
                <span class="flash-icon">✓</span>
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
