<link rel="stylesheet" href="/css/app.css">

@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')
<div class="container">
    <h1>Novo Produto</h1>

    <form method="POST" action="/products">
        @csrf

        <input type="text" name="name" placeholder="Nome do produto">
        <input type="number" name="quantity" placeholder="Quantidade">
        <input type="number" step="0.01" name="price" placeholder="Preço">

        <button type="submit">Salvar</button>
    </form>

    <br>
    <a href="/products">Voltar</a>
</div>
@endsection
