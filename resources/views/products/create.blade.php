<link rel="stylesheet" href="/css/app.css">

@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')
<div class="container">
    <h1>Novo Produto</h1>

    <form method="POST" action="/products">
        @csrf

        <div class="form-group">
            <label>Nome do Produto</label>
            <input 
                type="text" 
                name="name" 
                {{-- placeholder="Nome do produto" --}}
                value="{{ old('name') }}"
                class="{{ $errors->has('name') ? 'input-error' : '' }}"
            >   
        </div>
        
        <div class="form-group">
            <label>Quantidade</label>
            <input 
                type="number" 
                name="quantity" 
                {{-- placeholder="Quantidade" --}}
                value="{{ old('quantity') }}"
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
                value="{{ old('price') }}"
                class="{{ $errors->has('price') ? 'input-error' : '' }}"
            >
        </div>

        <button type="submit" class="btn-primary">Salvar produto</button>
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
