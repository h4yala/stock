@extends('layouts.app')

@section('title', 'Histórico')

@section('content')
<div class="container">
    <h1>Histórico - {{ $product->name }}</h1>

    <div class="actions">
        <a href="/products" class="btn btn-outline">
            ← Voltar
        </a>
    </div>

    @if($movements->isEmpty())
        <p>Nenhuma movimentação registrada.</p>
    @else
        <div class="history-list">
            @foreach($movements as $movement)
                <div class="history-item {{ $movement->type }}">
    
                    <div class="history-left">
                        <span class="badge {{ $movement->type }}">
                            {{ $movement->type === 'in' ? 'Entrada' : 'Saída' }}
                        </span>

                        <span class="history-quantity">
                            Quantidade: {{ $movement->quantity }}
                        </span>
                    </div>

                    <div class="history-date">
                        {{ $movement->created_at->format('d/m/Y H:i') }}
                    </div>

                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection