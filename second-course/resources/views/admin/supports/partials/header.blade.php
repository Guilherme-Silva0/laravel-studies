<header class="flex items-center justify-between">
    <div class="flex items-center gap-x-3">
        <h1 class="text-2xl text-gray-100">Fórum</h1>
        <span class="bg-slate-800 text-blue-600 text-xs px-3 py-1 rounded-full">{{ $supports->total() }} dúvidas</span>
    </div>

    <div class="flex items-center gap-x-3 mt-2">
        <a href="{{ route('supports.create') }}"
            class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-100 transition-all duration-200 bg-slate-800 rounded-full gap-x-2 sm:w-auto hover:opacity-70">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <span>Nova dúvida</span>
        </a>
    </div>
</header>

<div class="mt-2 md:flex md:items-center md:justify-between">
    <div class="relative flex items-center mt-4 md:mt-0">
        <span class="absolute">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5 mx-3 text-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
        </span>
        <form action="{{ route('supports.index') }}" method="get">
            <input name="filter" type="text" placeholder="Procurar"
                class="block w-full py-1.5 pr-5 border rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 bg-slate-800 text-gray-300 border-gray-600  focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                value="{{ $filters['filter'] ?? '' }}">
        </form>
    </div>
</div>
