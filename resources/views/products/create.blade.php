<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
</head>
<body>

<h1>Cadastrar Produto</h1>

<form action="/products" method="POST">
    @csrf

    <div>
        <label>Nome</label><br>
        <input type="text" name="name">
    </div>

    <div>
        <label>Descrição</label><br>
        <textarea name="description"></textarea>
    </div>

    <div>
        <label>Quantidade</label><br>
        <input type="number" name="quantity">
    </div>

    <div>
        <label>Preço</label><br>
        <input type="number" step="0.01" name="price">
    </div>

    <br>
    <button type="submit">Salvar</button>
</form>

</body>
</html>

