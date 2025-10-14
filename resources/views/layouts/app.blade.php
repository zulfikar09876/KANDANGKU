
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KANDANGKU') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Navigation -->
        <nav class="navbar">
            <div class="nav" style="justify-content: space-between;">
                <div class="flex items-center" style="gap:.75rem;">
                    <a href="/" class="text-white" style="font-weight:700; font-size:1.25rem; letter-spacing:.3px;">KANDANGKU</a>
                </div>

                <div class="flex items-center" style="gap:.5rem;">
                    @auth
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                        <a href="{{ route('public.articles.index') }}">Artikel</a>
                        <a href="{{ route('goats.index') }}">Kambing</a>
                        <a href="{{ route('kandangs.index') }}">Kandang</a>
                        <a href="{{ route('feeds.index') }}">Pakan</a>
                        <a href="{{ route('reproductions.index') }}">Reproduksi</a>
                        <a href="{{ route('kids.index') }}">Anak</a>
                        <a href="{{ route('healths.index') }}">Kesehatan</a>
                        <a href="{{ route('fattenings.index') }}">Penggemukan</a>
                        <a href="{{ route('record-logs.index') }}">Pencatatan</a>
                        <a href="{{ route('marketings.index') }}">Pemasaran</a>
                        <a href="{{ route('plannings.index') }}">Perencanaan</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="btn btn-outline">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>
</html>