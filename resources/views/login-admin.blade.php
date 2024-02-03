<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Windham Garden Admin</title>
    <link rel="shortcut icon" href="{{ asset('img/icon_wyndham.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body>
    <div class="container m-auto flex justify-center items-center">
        <div class="w-fit mt-5 p-5 bg-white-100/90">
            <div class="flex flex-col justify-center items-center mb-5">
                <img class="rounded-full w-32 mb-5 shadow-lg shadow-green-500/50"  src="{{ asset('img/icon_wyndham.png') }}">
                <p class="text-lg font-medium">Administration</p>
                <p class="text-xl text-green-600">Wyndham Garden</p>
            </div>
              @livewire('login-wynd')
        </div>
    </div>
    @livewireScripts

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session()->has('Success'))
      <script>
        swal({
              title: "Success",
              text: "{{session()->get('Success')}}",
              icon: "success",
              timer: 3000,
            });
      </script>
    @endif
    @if (session()->has('Error'))
      <script>
        swal({
              title: "Error",
              text: "{{session()->get('Error')}}",
              icon: "error",
              timer: 3000,
            });
      </script>
    @endif
</body>
</html>