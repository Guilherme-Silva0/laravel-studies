@extends('admin.layouts.app')

@section('title', "Detalhes da Dúvida {$support->subject}")

@section('content')
    <!-- component -->
    <div class="flex justify-center min-h-screen">
        <div class="md:w-3/5 w-3/4 px-10 flex flex-col gap-2 p-5">
            <div class="flex justify-between items-center">
                <h1 class="text-lg text-gray-100">Detalhes da Dúvida: <b class="text-blue-600">{{ $support->subject }}</b>
                </h1>
                @can('owner', $support->user_id)
                    <form action="{{ route('supports.destroy', $support->id) }}" method="post">
                        @csrf()
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 text-gray-100 font-bold py-2 px-4 border-b-4 border-red-700 hover:scale-105 transition rounded">Deletar</button>
                    </form>
                @endcan
            </div>
            <ul>
                <li class="text-gray-100">Status: <x-status-support :status="$support->status" /></li>
                <li class="text-gray-100">Descrição: {{ $support->body }}</li>
            </ul>

            <!-- Item Container -->
            <div class="flex flex-col gap-3 text-gray-100">

                @forelse ($replies as $reply)
                    <div class="flex flex-col gap-3 bg-gray-900 rounded-lg p-4 shadow-xl">
                        <!-- Profile and Rating -->
                        <div class="flex justify-between">
                            <div class="flex gap-2 items-center">
                                <div class="w-7 h-7 flex justify-center items-center rounded-full bg-red-500">CF</div>
                                <b class="text-blue-600">{{ $reply['user']['name'] }}</b>
                            </div>
                        </div>

                        <div>
                            {{ $reply['content'] }}
                        </div>

                        <div class="flex justify-between">
                            <span class="text-sm text-gray-400">{{ $reply['created_at'] }}</span>
                            @can('owner', $reply['user']['id'])
                                <form action="{{ route('replies.destroy', [$support->id, $reply['id']]) }}" method="post">
                                    @csrf()
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-gray-100 py-1 px-4 border-b-4 border-red-700 rounded transition hover:scale-105">Deletar</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                @empty
                    <p class="text-gray-400 text-sm">Sem respostas</p>
                @endforelse


                <form method="POST" action="{{ route('replies.store', $support->id) }}" class="py-2">
                    @csrf
                    <textarea rows="2" name="content" placeholder="Sua resposta"
                        class="resize-none block w-full py-1.5 pr-5 border rounded-lg placeholder-gray-400/70 pl-2 bg-slate-900 text-gray-300 border-gray-700  focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"></textarea>
                    <button type="submit"
                        class="mt-2 bg-blue-600 w-fit px-3 py-1 rounded transition-all text-gray-100 hover:scale-110">
                        Enviar
                    </button>
                </form>


            </div>
        </div>
    </div>

@endsection
