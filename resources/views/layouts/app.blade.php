<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kestory') }}</title>
      @vite('resources/css/app.css')
      <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
      <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.10/dist/cdn.min.js"></script>
    </head>
    <body class="h-full">
      @include('layouts.header')
      {{-- <x-header>{{$title}}</x-header> --}}
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{-- <h3 class="text-3xl font-bold tracking-tighter text-gray-900"></h3> --}}
                @yield('content')
            </div>
        </main>


        @include('layouts.footer')
        <script>
          CKEDITOR.replace('description');
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    </body>
    </html>
