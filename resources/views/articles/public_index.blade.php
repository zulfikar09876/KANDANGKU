<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artikel - KANDANGKU</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="font-['Inter'] bg-gray-50 text-gray-900">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-green-600">🐐 KANDANGKU</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('public.articles.index') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium">Artikel</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-700">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                        <a href="{{ route('register') }}" class="bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-700">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Artikel</h1>

            @if($articles->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($articles as $article)
                        <article class="bg-white overflow-hidden shadow rounded-lg hover:shadow-lg transition-shadow duration-300">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-900 mb-2">
                                    <a href="{{ route('public.articles.show', $article) }}" class="hover:text-green-600">{{ $article->title }}</a>
                                </h2>
                                <p class="text-gray-600 text-sm mb-4">
                                    Oleh {{ $article->author ?? 'Anonim' }} • {{ $article->published_at->format('d M Y') }}
                                </p>
                                <p class="text-gray-700 line-clamp-3">
                                    {{ Str::limit(strip_tags($article->content), 150) }}
                                </p>
                                <div class="mt-4">
                                    <a href="{{ route('public.articles.show', $article) }}" class="text-green-600 hover:text-green-800 text-sm font-medium">Baca selengkapnya →</a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $articles->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">Belum ada artikel yang dipublikasikan.</p>
                </div>
            @endif
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-400">© 2024 KANDANGKU. Dibuat dengan ❤️ untuk peternak Indonesia</p>
        </div>
    </footer>
</body>
</html>
