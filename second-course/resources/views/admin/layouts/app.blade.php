<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-950">
    <section class="container px-4 mx-auto">
        @yield('header')
        <main>
            @yield('content')
        </main>
        <footer>
            #default footer
        </footer>
    </section>
</body>

</html>