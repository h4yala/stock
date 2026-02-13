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

    @if ($errors->any())
        <div class="alert alert-error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
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

                <div class="product-actions">

                    <!-- BLOCO MOVIMENTAÇÃO -->
                    <form action="/products/{{ $product->id }}/movement"
                        method="POST"
                        class="movement-block">
                        @csrf

                        <input 
                            type="number"
                            name="quantity"
                            placeholder="Qtd"
                            min="1"
                            class="movement-input"
                        >

                        <div class="movement-buttons">
                            <button 
                                name="type"
                                value="in"
                                class="btn btn-success btn-small">
                                + Entrada
                            </button>

                            <button 
                                name="type"
                                value="out"
                                class="btn btn-warning btn-small">
                                − Saída
                            </button>
                        </div>
                    </form>

                    <!-- BLOCO ADMIN -->
                    <div class="admin-buttons">
                        <a href="/products/{{ $product->id }}/history"
                        class="btn btn-outline btn-small">
                            Histórico
                        </a>

                        <a href="/products/{{ $product->id }}/edit"
                        class="btn btn-outline btn-small">
                            Editar
                        </a>

                        <form action="/products/{{ $product->id }}"
                            method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-small">
                                Excluir
                            </button>
                        </form>
                    </div>

                </div>

            </div>
        @endforeach
    @endif
</div>



@endsection