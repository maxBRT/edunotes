<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
    <title>{{ $title ?? 'My App' }}</title>
    @livewireStyles
    @vite('resources/css/app.css')
</head>

<body class="bg-background text-foreground">
    <header class="p-4 bg-secondary shadow">
        <h1 class="text-2xl text-secondary-foreground font-bold">My App</h1>
    </header>

    <main class="p-6">
        {{ $slot }}
    </main>

    <footer class="p-4 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} My App
    </footer>
    @vite('resources/js/app.js')
    @livewireScripts

    <script>
        function emitDeleteModal(id, name) {
            window.Livewire.dispatch('openDeleteModal', {id: id, name: name});
        }
    </script>
</body>

</html>
