@extends('admin.layouts.app')
@section('title', 'Editar')

@section('header')
    <h1 class="text-2xl text-gray-100 my-2">Editar dúvida - {{ $support->subject }}</h1>
@endsection

@section('content')
    <x-alert />

    <form action="{{ route('supports.update', $support->id) }}" method="post">
        @method('put')
        @include('admin.supports.partials.form', [
            'buttonText' => 'Editar',
            'support' => $support,
        ])
    </form>
@endsection
