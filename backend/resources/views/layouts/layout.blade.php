<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'PasteBin made by VladaEs')</title>
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



</head>

<body>




    <main class="pageWrapper mb-5 flex flex-col">

        <x-header />

        @yield('content')
    </main>


@yield('scripts')

</body>

</html>
