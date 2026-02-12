<link rel="stylesheet" href="/css/app.css">

@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
<div class="container">
    <h1>Editar Produto</h1>

    <form method="POST" action="/products/{{ $product->id }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nome do Produto</label>
            <input 
                type="text" 
                name="name" 
                {{-- placeholder="Nome do produto" --}}
                value="{{ $product->name }}"
                class="{{ $errors->has('name') ? 'input-error' : '' }}"
            >   
        </div>
        
        <div class="form-group">
            <label>Quantidade</label>
            <input 
                type="number" 
                name="quantity" 
                {{-- placeholder="Quantidade" --}}
                value="{{ $product->quantity }}"
                class="{{ $errors->has('quantity') ? 'input-error' : '' }}"
            >
        </div>
        
        <div class="form-group">
            <label>Preço</label>
            <input 
                type="number" 
                step="0.01" 
                name="price" 
                {{-- placeholder="Preço" --}}
                value="{{ $product->price }}"
                class="{{ $errors->has('price') ? 'input-error' : '' }}"
            >
        </div>

        <button type="submit" class="btn-primary">Atualizar produto</button>
    </form>


    <br>
    <a href="/products">Voltar</a>
</div>
@endsection

@if ($errors->any())
    <div class="alert-error">
        <strong>Ops! Algo deu errado:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif