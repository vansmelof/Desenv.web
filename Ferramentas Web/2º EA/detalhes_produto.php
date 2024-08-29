
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

$index = $_GET['index'] ?? null;

if ($index === null || !isset($produtos[$index])) {
    echo "Produto não encontrado!";
    exit;
}

$produto = $produtos[$index];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto - <?php echo $produto["nome"]; ?></title>
</head>
<body>
    <h1><?php echo $produto["nome"]; ?></h1>
    <p><strong>Descrição:</strong> <?php echo $produto["descricao"]; ?></p>
    <p><strong>Preço:</strong> R$ <?php echo number_format($produto["preco"], 2, ',', '.'); ?></p>
    <a href="produtos.php">Voltar à lista de produtos</a>
</body>
</html>
