@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <div class="actions">
        <a href="/products" class="btn btn-outline">
            ← Produtos
        </a>
    </div>

    <div class="dashboard-grid">

        <div class="card">
            <h3>Total de Produtos</h3>
            <p>{{ $totalProducts }}</p>
        </div>

        <div class="card">
            <h3>Total em Estoque</h3>
            <p>{{ $totalQuantity }}</p>
        </div>

        <div class="card">
            <h3>Valor Total</h3>
            <p>R$ {{ number_format($totalValue, 2, ',', '.') }}</p>
        </div>

    </div>
</div>
@endsection