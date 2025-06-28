<?php include 'conexao.php'; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $categoria = $_POST["categoria"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];

    $stmt = $conn->prepare("INSERT INTO produtos (nome, categoria, preco, quantidade) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdi", $nome, $categoria, $preco, $quantidade);
    $stmt->execute();
    echo "<p>✅ Produto cadastrado!</p>";
}
?>

<link rel="stylesheet" href="estilo.css">

<h2>Cadastrar Produto</h2>
<form method="post">
    Nome: <input type="text" name="nome" required><br>
    Categoria: <input type="text" name="categoria" required><br>
    Preço: <input type="number" step="0.01" name="preco" required><br>
    Quantidade: <input type="number" name="quantidade" required><br>
    <input type="submit" value="Cadastrar">
</form>
<a href="index.php">⬅ Voltar</a>