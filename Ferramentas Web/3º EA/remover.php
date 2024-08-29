
<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: produtos.php');
        exit;
    } catch (PDOException $e) {
        die("Erro ao remover produto: " . $e->getMessage());
    }
} else {
    header('Location: produtos.php');
    exit;
}
?>
