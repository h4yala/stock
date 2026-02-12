@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
<div class="container">
    <h1>Editar Produto</h1>

    @if ($errors->any())
        <div class="alert alert-error">
            <strong>Ops! Algo deu errado:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/products/{{ $product->id }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nome do Produto</label>
            <input 
                type="text" 
                name="name"
                value="{{ old('name', $product->name) }}"
                class="{{ $errors->has('name') ? 'input-error' : '' }}"
            >
        </div>
        
        <div class="form-group">
            <label>Quantidade</label>
            <input 
                type="number" 
                name="quantity"
                value="{{ old('quantity', $product->quantity) }}"
                class="{{ $errors->has('quantity') ? 'input-error' : '' }}"
            >
        </div>
        
        <div class="form-group">
            <label>Preço</label>
            <input 
                type="number" 
                step="0.01"
                name="price"
                value="{{ old('price', $product->price) }}"
                class="{{ $errors->has('price') ? 'input-error' : '' }}"
            >
        </div>

        <div style="display:flex; gap:12px; margin-top:20px;">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="/products" class="btn btn-outline">Voltar</a>
        </div>

    </form>
</div>
@endsection