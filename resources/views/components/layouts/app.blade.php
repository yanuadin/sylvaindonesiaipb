<!doctype html>
<html x-data="{ darkMode: localStorage.getItem('dark') === 'true'}"
      x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
      x-bind:class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
<div class="antialiased bg-gray-50 dark:bg-gray-900">
    <x-layouts.navbar />
    <x-layouts.sidebar />
    <main class="p-4 md:ml-64 h-auto pt-20">
        {{ $slot }}
    </main>
</div>
</body>

</html>

