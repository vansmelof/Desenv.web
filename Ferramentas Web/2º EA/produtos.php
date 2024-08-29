
<?php
$produtos = [
    [
        "nome" => "Snack Saudável",
        "descricao" => "Snack feito com frutas desidratadas",
        "preco" => 15.90
    ],
    [
        "nome" => "Refeição Congelada Fitness",
        "descricao" => "Refeição balanceada, rica em proteínas",
        "preco" => 25.99
    ],
    [
        "nome" => "Suco Natural Detox",
        "descricao" => "Suco natural a base de frutas e vegetais",
        "preco" => 8.75
    ]
];
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
        <?php foreach ($produtos as $index => $produto): ?>
            <li>
                <h2><a href="detalhe_produto.php?index=<?php echo $index; ?>"><?php echo $produto["nome"]; ?></a></h2>
                <p><?php echo $produto["descricao"]; ?></p>
                <p>Preço: R$ <?php echo number_format($produto["preco"], 2, ',', '.'); ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
