@extends('admin.layouts.app')
@section('title', $support->subject)

@section('header')
    <h1 class="text-2xl text-gray-100 my-2">Detalhes da dúvida {{ $support->id }}</h1>
@endsection

@section('content')
    <div class="bg-slate-800 flex flex-col gap-2 w-fit p-4 rounded-lg shadow-lg">
        <ul class="text-gray-100">
            <li>Assunto: {{ $support->subject }}</li>
            <li>Status: {{ $support->status }}</li>
            <li>Descrição: {{ $support->body }}</li>
        </ul>

        <form action="{{ route('supports.destroy', $support->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit"
                class="bg-red-500 px-3 py-1 rounded-lg text-gray-100 transition-all hover:scale-105">Deletar</button>
        </form>
    </div>
@endsection
