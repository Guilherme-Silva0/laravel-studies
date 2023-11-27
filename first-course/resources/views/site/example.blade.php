@extends('site.layout')

@section('title', 'Home')

@section('content')
    {{-- Isso é um comentário --}}

    @if (isset($name))
        <p>O nome é {{ $name }}</p>
    @else
        <p>O nome não foi informado</p>
    @endif

    {{-- estrurura de repetição --}}

    @for ($i = 0; $i <= 10; $i++)
        {{ $i }}
    @endfor

    <br />

    @php $i = 0; @endphp

    @while ($i <= 10)
        {{ $i }}
        @php $i++; @endphp
    @endwhile

    <br />

    @foreach ($fruits as $fruit)
        {{ $fruit }}
    @endforeach

    <br />

    {{-- Includes --}}

    @include('includes.example', ['title' => 'Mensagem de sucesso!'])

    {{-- Components --}}

    @component('components.example')
        @slot('paragraph')
            Texto qualquer vindo do slot
        @endslot
    @endcomponent
@endsection

@push('style')
@endpush

@push('script')
@endpush
