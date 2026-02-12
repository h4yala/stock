@extends('layouts.app')

@section('title', 'Produtos')

@section('content')

<div class="container">
    <h1>Lista de Produtos</h1>

    @if(session('success'))
        <div class="alert alert-success">
            ✓ {{ session('success') }}
        </div>
    @endif  

    <div class="actions">
        <a href="/dashboard" class="btn btn-outline">Dashboard</a>

        <a href="/products/create" class="btn btn-primary">
            Novo Produto
        </a>
    </div>

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

                <div style="display:flex; gap:8px;">
                    <a href="/products/{{ $product->id }}/edit" class="btn btn-outline">
                        Editar
                    </a>

                    <form action="/products/{{ $product->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button 
                            class="btn btn-danger"
                            onclick="return confirm('Tem certeza que deseja excluir este produto?')"
                        >
                            Excluir
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection