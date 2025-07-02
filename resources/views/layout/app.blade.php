<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="module" src="https://unpkg.com/cally"></script>
    @fluxAppearance
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">


    <x-nav />
    @php
        $hour = now()->format('H');
        $greeting = $hour < 12 ? 'Good Morning' : ($hour < 18 ? 'Good Afternoon' : 'Good Evening');
    @endphp
    <flux:main>
        <flux:heading size="xl" level="1">{{ $greeting }}, Jerold</flux:heading>


        {{ $slot }}
        <flux:separator variant="subtle" />

    </flux:main>





    @livewireScripts
    @fluxScripts

</body>

</html>
