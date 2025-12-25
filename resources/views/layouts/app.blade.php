<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Women in FinTech')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Women in FinTech</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
                <a class="nav-link" href="{{ route('members.index') }}">Members</a>
                <a class="nav-link" href="{{ route('events.index') }}">Events</a>
                <a class="nav-link" href="{{ route('success-stories.index') }}">Success Stories</a>
            </div>
        </div>
    </nav>

    <main class="container py-4 flex-grow-1">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('content')
    </main>

    <footer class="border-top bg-white">
        <div class="container py-3 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div class="text-muted small">
                © {{ date('Y') }} Women in FinTech
            </div>
            <div class="text-muted small">
                Proiect realizat de Andrei Baciu, Bonchiș Beniamin, Andrei Grădinariu
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.clickable-row').forEach(row => {
                row.addEventListener('click', () => {
                    window.location = row.dataset.href;
                });
            });
        });
    </script>

</body>

</html>