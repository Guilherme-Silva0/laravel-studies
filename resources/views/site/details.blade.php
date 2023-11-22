@extends('site.layout')
@section('title', 'Detalhes do produto')
@section('content')
    <div class="row container"> <br />
        @if (isset($product))
            <div class="col s12 m6">
                <img src="{{ $product->image }}" alt="Imagem do produto" class="responsive-img" />
            </div>
            <div class="col s12 m6">
                <h4>{{ $product->name }}</h4>
                <h4>R$ {{ number_format($product->price, 2, ',', '.') }}</h4>
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
