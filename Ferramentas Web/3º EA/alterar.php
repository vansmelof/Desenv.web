<!-- alterar.php -->
<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    try {
        $stmt = $pdo->prepare("UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco WHERE id = :id");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: produtos.php');
        exit;
    } catch (PDOException $e) {
        die("Erro ao atualizar produto: " . $e->getMessage());
    }
} else {
    $id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$produto) {
            die("Produto não encontrado!");
        }
    } catch (PDOException $e) {
        die("Erro ao buscar produto: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Produto</title>
</head>
<body>
    <h1>Alterar Produto</h1>
    <form method="post" action="alterar.php">
        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $produto['nome']; ?>" required>
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required><?php echo $produto['descricao']; ?></textarea>
        <label for="preco">Preço:</label>
        <input type="text" id="preco" name="preco" value="<?php echo $produto['preco']; ?>" required>
        <button type="submit">Salvar Alterações</button>
    </form>
    <a href="produtos.php">Cancelar</a>
</body>
</html>
