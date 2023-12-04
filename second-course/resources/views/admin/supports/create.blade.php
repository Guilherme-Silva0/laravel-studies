@extends('admin.layouts.app')
@section('title', 'Novo layout')

@section('header')
    <h1 class="text-2xl text-gray-100 my-2">Nova dúvida</h1>
@endsection

@section('content')
    <x-alert />

    <form action="{{ route('supports.store') }}" method="post">
        @include('admin.supports.partials.form', [
            'buttonText' => 'Criar',
        ])
    </form>
@endsection
