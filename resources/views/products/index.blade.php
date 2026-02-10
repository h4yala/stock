<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
</head>
<body>

    <h1>Lista de Produtos</h1>

    @if($products->isEmpty())
        <p>Nenhum produto cadastrado.</p>
    @else
        <ul>
            @foreach($products as $product)
                <li>
                    <strong>{{ $product->name }}</strong><br>
                    Quantidade: {{ $product->quantity }}<br>
                    Preço: R$ {{ number_format($product->price, 2, ',', '.') }}
                </li>

                <a href="/products/{{ $product->id }}/edit">Editar</a>

                <form action="/products/{{ $product->id }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>

            @endforeach
        </ul>
    @endif

</body>
</html>
