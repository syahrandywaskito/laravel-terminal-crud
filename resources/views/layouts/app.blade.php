<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
    <title>
        @yield('title')
    </title>
    @vite('resources/css/app.css')
    {{-- <style>
       {!! Vite::content('resources/css/app.css') !!}
    </style>
    <script>
      {!! Vite::content('resources/js/app.js') !!}
    </script> --}}
</head>
<body class="font-body">
    
    @yield('content')

</body>
</html>