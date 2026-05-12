<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" /> --}}
    <link rel="stylesheet" href="{{ asset('css/daisyui5.css') }}">
    <title>@yield('title')</title>
</head>
@auth
    @php
        (Auth::user()->role == 'Admin') ? $colors = '#009a,#000e' : $colors = '#111a,#111a'@endphp
@else
    @php
        $colors = '#000c,#0000' @endphp

@endauth

<body class="bg-[linear-gradient(to_top,{{$colors}}),url({{asset('images/bg-welcome.png')}})] min-h-dvh bg-no-repeat bg-center bg-cover pt-14 bg-fixed">
    <main class="p-12 flex flex-col gap-2 justify-center items-center min-h-dvh">
        @yield('content')
    </main>
    <script src="{{asset('js/tailwindcss4.js') }}" > </script>
    <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('js/sweetalert2@11.js')}}"></script>
    @yield('js')

    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    {{-- <body class="bg-[url('images/bg-welcome.png')]
    bg-gradient
    bg-cover
    min-h-dvh"
    >
    <main>
        <h1>@yield('title')</h1>
        @yield('content')
    </main>

</body> --}}
</body>
</html>
