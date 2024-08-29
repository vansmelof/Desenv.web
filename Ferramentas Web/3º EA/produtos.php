
<?php
include 'db.php';

try {
    $stmt = $pdo->query("SELECT * FROM produtos");
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar produtos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Sabor 2024</title>
</head>
<body>
    <h1>Produtos da Sabor 2024</h1>
    <ul>
        <?php foreach ($produtos as $produto): ?>
            <li>
                <h2><a href="detalhe_produto.php?id=<?php echo $produto['id']; ?>"><?php echo $produto["nome"]; ?></a></h2>
                <p><?php echo $produto["descricao"]; ?></p>
                <p>Preço: R$ <?php echo number_format($produto["preco"], 2, ',', '.'); ?></p>
                <form action="remover.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
                    <button type="submit">Remover</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
