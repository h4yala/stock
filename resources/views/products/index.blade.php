@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="container">
    <h1>Lista de Produtos</h1>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif  
    
    <a href="/products/create">+ Novo produto</a>

    @if($products->isEmpty())
        <p>Nenhum produto cadastrado.</p>
    @else
        @foreach($products as $product)
            <div class="product">
                <div>
                    <strong>{{ $product->name }}</strong><br>
                    Quantidade: {{ $product->quantity }}<br>
                    Preço: R$ {{ number_format($product->price, 2, ',', '.') }}
                </div>

                <div>
                    <a href="/products/{{ $product->id }}/edit">Editar</a>

                    <form action="/products/{{ $product->id }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection

