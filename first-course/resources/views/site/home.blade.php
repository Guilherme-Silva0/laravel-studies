@extends('site.layout')

@section('title', 'Home')

@section('content')
    <div class="row container">
        @foreach ($products as $product)
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ url("storage/{$product->image}") }}">
                        @can('seeProduct', $product)
                            <a href="{{ route('site.details', $product->slug) }}"
                                class="btn-floating halfway-fab waves-effect waves-light red">
                                <i class="material-icons">visibility</i>
                            </a>
                        @endcan
                    </div>
                    <div class="card-content">
                        <span class="card-title">{{ $product->name }}</span>
                        <p>{{ Str::limit($product->description, 100) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row center">
        {{ $products->links('custom.pagination') }}
    </div>
@endsection
