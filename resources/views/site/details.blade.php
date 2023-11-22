@extends('site.layout')
@section('title', 'Detalhes do produto')
@section('content')
    <div class="row container">
        @if (isset($product))
            <div class="col s12 m6">
                <img src="{{ $product->image }}" alt="Imagem do produto" class="responsive-img" />
            </div>
            <div class="col s12 m6">
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->description }}</p>
                <p>
                    Postado por:
                    {{ $product->user->first_name . ' ' . $product->user->last_name }} <br />
                    Categoria: {{ $product->category->name }}
                </p>
                <button class="btn orange btn-large waves-effect waves-light">Comprar</button>
            </div>
        @else
            <div class="col s12 center">
                <h2>Produto não encontrado</h2>
            </div>
        @endif
    </div>
@endsection
