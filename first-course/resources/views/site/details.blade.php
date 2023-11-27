@extends('site.layout')
@section('title', 'Detalhes do produto')
@section('content')
    <div class="row container"> <br />
        @if (isset($product))
            <div class="col s12 m6">
                <img src="{{ url("storage/{$product->image}") }}" alt="Imagem do produto" class="responsive-img" />
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
                <form action={{ route('site.cart.add') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="number" name="quantity" value="1" min="1">
                    <input type="hidden" name="image" value="{{ $product->image }}">
                    <button class="btn orange btn-large waves-effect waves-light">Comprar</button>
                </form>
            </div>
        @else
            <div class="col s12 center">
                <h2>Produto não encontrado</h2>
            </div>
        @endif
    </div>
@endsection
