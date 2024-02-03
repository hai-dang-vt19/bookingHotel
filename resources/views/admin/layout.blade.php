<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Windham Garden Admin</title>
    <link rel="shortcut icon" href="{{ asset('img/icon_wyndham.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine Plugins -->
    <script  cript defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @livewireStyles
</head>
<body>
    <div wire:offline>
        <div class="z-20 fixed top-0 left-0 w-full py-5 bg-red-500 text-white text-center font-bold text-lg capitalize rounded-b flex justify-center alert"
            x-data="{ error: true }" x-show="error"
            {{-- x-data="{ error: true }" x-show="error" x-init="setTimeout(() => error = false, 5000)" --}}
            x-transition:leave="transition alert-out duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 mx-2">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
            </svg>       
            <p class="mx-2">Opps! No internet</p>
        </div>
    </div>
    
    <div class="container mx-auto">
        <div class="bg-white shadow px-5 py-2 flex flex-wrap justify-around items-center ms:flex-col">
            <div>
                <a href="{{ route('booking') }}"><img style="width: 300px" src="{{ asset('img/Logo_wyndham.png') }}"></a>
            </div>
            <div class="flex flex-warp gap-5 justify-between">
                @yield('item_nav')
                <a href="#"><img class="rounded-full me-4 hover:brightness-125" style="width: 30px; min-width: 30px;" src="{{ asset('img/icon_wyndham.png') }}"></a>
                <a href="{{ route('logout') }}" class="flex items-center rounded px-3 py-1 text-white font-medium bg-gradient-to-r from-green-400 to-blue-500 hover:from-red-500 hover:to-yellow-500">Logout</a>
            </div>
        </div>
        <div class="p-5">
            @yield('main')
        </div>
    </div>
    @livewireScripts
    <script>
        Livewire.onPageExpired((response, message) => {})
    </script>
</body>
</html>