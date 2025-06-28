<?php include 'conexao.php'; ?>

<h2>Estoque Atual</h2>
<table border="1">
    <tr>
        <th>Nome</th>
        <th>Categoria</th>
        <th>Preço</th>
        <th>Quantidade</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM produtos");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['nome']}</td>
            <td>{$row['categoria']}</td>
            <td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>
            <td>{$row['quantidade']}</td>
        </tr>";
    }
    ?>
</table>
<a href="index.php">⬅ Voltar</a>