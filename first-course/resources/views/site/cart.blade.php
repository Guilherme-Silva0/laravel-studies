@extends('site.layout')

@section('title', 'Carrinho')

@section('content')
    <div class="row container">

        @if ($message = Session::get('success'))
            <div class="card green">
                <div class="card-content white-text">
                    <span class="card-title">Tudo certo!</span>
                    <p>{{ $message }}</p>
                </div>
            </div>
        @endif

        @if ($message = Session::get('warning'))
            <div class="card orange">
                <div class="card-content white-text">
                    <span class="card-title">Opa!</span>
                    <p>{{ $message }}</p>
                </div>
            </div>
        @endif

        @if ($items->count() === 0)
            <div class="card orange">
                <div class="card-content white-text">
                    <span class="card-title">Opa!</span>
                    <p>Seu carrinho está vazio!</p>
                </div>
            </div>
        @else
            <h5>Seu carrinho possui {{ $items->count() }} {{ $items->count() > 1 ? 'itens' : 'item' }}</h5>
            <table class="striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                <img src="{{ url("storage/{$item->attributes->image}") }}" alt="Imagem do produto"
                                    width="70" class="responsive-img circle">
                            </td>

                            <td>{{ $item->name }}</td>

                            <td>R$ {{ number_format($item->price, 2, ',', '.') }}</td>

                            {{-- Botão de atualizar --}}

                            <form action="{{ route('site.cart.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <td>

                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input style="width: 40px; font-weight: 600;" min="1" class="white center"
                                        type="number" name="quantity" value="{{ $item->quantity }}">

                                </td>
                                <td>

                                    <button class="btn-floating waves-effect waves-light orange">
                                        <i class="material-icons">refresh</i>
                                    </button>

                            </form>

                            {{-- Botão de remover --}}

                            <form action="{{ route('site.cart.remove') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button class="btn-floating waves-effect waves-light red">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="card orange">
                <div class="card-content white-text">
                    <span class="card-title">R$ {{ number_format(\Cart::getTotal(), 2, ',', '.') }}</span>
                    <p>Pague em até 12x sem juros</p>
                </div>
            </div>

        @endif

        <div class="row container center">
            <a href="{{ route('site.index') }}" class="btn waves-effect waves-light blue">
                Continuar comprando <i class="material-icons right">arrow_back</i>
            </a>

            <a href="{{ route('site.cart.clear') }}" class="btn waves-effect waves-light blue">
                Limpar carrinho <i class="material-icons right">clear</i>
            </a>

            <button class="btn waves-effect waves-light green">
                Finalizar compra <i class="material-icons right">arrow_back</i>
            </button>
        </div>

    </div>
@endsection
