<?php include 'conexao.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto_id = $_POST["produto_id"];
    $tipo = $_POST["tipo"];
    $qtd = (int)$_POST["quantidade"];

    $produto = $conn->query("SELECT quantidade FROM produtos WHERE id = $produto_id")->fetch_assoc();
    $nova_qtd = $tipo === "entrada" ? $produto["quantidade"] + $qtd : $produto["quantidade"] - $qtd;

    if ($nova_qtd < 0) {
        echo "<p>❌ Estoque insuficiente!</p>";
    } else {
        $conn->query("UPDATE produtos SET quantidade = $nova_qtd WHERE id = $produto_id");
        echo "<p>✅ Estoque atualizado!</p>";
    }
}
?>

<h2>Movimentar Estoque</h2>
<form method="post">
    Produto:
    <select name="produto_id">
        <?php
        $result = $conn->query("SELECT id, nome FROM produtos");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['nome']}</option>";
        }
        ?>
    </select><br>
    Tipo:
    <select name="tipo">
        <option value="entrada">Entrada</option>
        <option value="saida">Saída</option>
    </select><br>
    Quantidade: <input type="number" name="quantidade" required><br>
    <input type="submit" value="Atualizar">
</form>
<a href="index.php">⬅ Voltar</a>