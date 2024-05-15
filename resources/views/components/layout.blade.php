<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.10/dist/cdn.min.js"></script>
</head>
<body class="h-full">
  <x-navbar></x-navbar>
  <x-header>{{$title}}</x-header>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h3 class="text-3xl font-bold tracking-tighter text-gray-900">{{$slot}}</h3>
        </div>
    </main>

</body>
</html>