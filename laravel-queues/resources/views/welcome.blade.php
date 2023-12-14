<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @vite('resources/css/app.css')
</head>

<body class="antialiased h-screen w-screen">
    <main class="bg-gradient-to-br from-slate-800 to-blue-950 flex items-center justify-center h-full w-full shadow-lg">
        <div class="flex flex-col gap-2 items-center bg-gray-900/70 border border-gray-600 p-10 rounded text-white">
            <h2 class="text-2xl">Job lançado com sucesso!</h2>

            <a href="{{ route('attack') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Ataque
            </a>
        </div>
    </main>
</body>

</html>
