<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title}}</title>

    <link href="css/my-great-app.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>

    @if($uses_livewire)
        @livewireStyles
    @endif

    @stack('head')
</head>
<body class="antialiased">

    <div class="min-h-full">

        <x-navigation/>

        <x-header :title="$title"/>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <!-- Replace with your content -->
                <div class="px-4 py-6 sm:px-0">
                    <div class="rounded-lg border-4 border-dashed border-gray-200 p-4 ">
                        {{ $slot }}
                    </div>
                </div>
                <!-- /End replace -->
            </div>
        </main>
    </div>

<x-footer/>


    @stack('footer')

    @if($uses_livewire)
        @livewireScripts
    @endif
</body>
</html>
