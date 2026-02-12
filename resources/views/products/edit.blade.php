<link rel="stylesheet" href="/css/app.css">

@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
<div class="container">
    <h1>Editar Produto</h1>

    <form method="POST" action="/products/{{ $product->id }}">
        @csrf
        @method('PUT')

        <input 
            type="text" 
            name="name" 
            value="{{ $product->name }}"
        >

        <input 
            type="number" 
            name="quantity" 
            value="{{ $product->quantity }}"
        >

        <input 
            type="number" 
            step="0.01" 
            name="price" 
            value="{{ $product->price }}"
        >

        <button type="submit">Atualizar</button>
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