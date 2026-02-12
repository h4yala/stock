<link rel="stylesheet" href="/css/app.css">

@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')
<div class="container">
    <h1>Novo Produto</h1>

    <form method="POST" action="/products">
        @csrf

        <input type="text" name="name" placeholder="Nome do produto" value="{{ old('name') }}" >
        <input type="number" name="quantity" placeholder="Quantidade" value="{{ old('quantity') }}" >
        <input type="number" step="0.01" name="price" placeholder="Preço" value="{{ old('price') }}" >

        <button type="submit">Salvar</button>
    </form>

    <br>
    <a href="/products">Voltar</a>
</div>
@endsection

@if ($errors->any())
    <div style="color:red; margin-bottom:10px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
