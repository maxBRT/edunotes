<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
    <title>{{ $title ?? 'EduNotes' }}</title>
    @livewireStyles
    @vite('resources/css/app.css')
    <script>
        // Initialize theme before page renders to prevent flash
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body class="bg-background text-foreground">
    <header class="p-4 bg-secondary shadow">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <a href="{{ route('home') }}"
                class="flex items-center gap-2 text-2xl text-secondary-foreground font-bold hover:opacity-80 transition-all hover:scale-105">
                <x-icons.book class="w-8 h-8 text-primary" />
                <span>EduNotes</span>
            </a>
            <div class="flex items-center gap-4">
                <button id="theme-toggle" class="p-2 rounded-lg hover:bg-secondary-foreground/10 transition-colors">
                    <x-icons.moon id="theme-toggle-dark-icon" class="hidden w-5 h-5 text-secondary-foreground" />
                    <x-icons.sun id="theme-toggle-light-icon" class="hidden w-5 h-5 text-secondary-foreground" />
                </button>
                @auth
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 rounded-lg bg-secondary-foreground/10 text-secondary-foreground hover:bg-secondary-foreground/20 transition-colors font-medium">
                        Logout
                    </button>
                </form>
                @endauth
            </div>
        </div>
    </header>

    <main class="p-6">
        {{ $slot }}
    </main>

    <footer class="p-4 text-center text-sm text-muted-foreground">
        &copy; {{ date('Y') }} EduNotes
    </footer>
    @vite('resources/js/app.js')
    @livewireScripts

    <script>
        function emitDeleteModal(id, name) {
            window.Livewire.dispatch('openDeleteModal', {id: id, name: name});
        }

        // Theme toggle functionality
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Show the correct icon based on current theme
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        themeToggleBtn.addEventListener('click', function () {
            // Toggle icons
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // Toggle theme
            if (localStorage.getItem('theme')) {
                if (localStorage.getItem('theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                }
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
            }
        });
    </script>
</body>

</html>
