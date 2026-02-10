<h1>Editar produto</h1>

<form method="POST" action="/products/{{ $product->id }}">
    @csrf
    @method('PUT')

    <input 
        type="text" 
        name="name" 
        value="{{ $product->name }}"
    >

    <button type="submit">Atualizar</button>
</form>