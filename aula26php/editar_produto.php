<?php

require_once "config/database.php";

$id = $_GET["id"] ?? 0;

$stmt = $pdo->prepare(
    "SELECT * FROM produtos WHERE id = ?"
);

$stmt->execute([$id]);

$produto = $stmt->fetch();

if (!$produto) {
    die("Produto não encontrado.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST["nome"]);
    $descricao = trim($_POST["descricao"]);
    $preco = $_POST["preco"];
    $estoque = $_POST["estoque"];

    $stmt = $pdo->prepare(
        "UPDATE produtos
        SET nome = ?, descricao = ?, preco = ?, estoque = ?
        WHERE id = ?"
    );

    $stmt->execute([
        $nome,
        $descricao,
        $preco,
        $estoque,
        $id
    ]);

    header("Location: produtos.php");
    exit;
}

include "views/cabecalho.php";

?>

<h1>Editar Produto</h1>

<form method="POST">

    <input
        type="text"
        name="nome"
        value="<?php echo $produto['nome']; ?>"
        required
    >

    <br><br>

    <textarea
        name="descricao"
    ><?php echo $produto['descricao']; ?></textarea>

    <br><br>

    <input
        type="number"
        step="0.01"
        name="preco"
        value="<?php echo $produto['preco']; ?>"
        required
    >

    <br><br>

    <input
        type="number"
        name="estoque"
        value="<?php echo $produto['estoque']; ?>"
        required
    >

    <br><br>

    <button type="submit">
        Salvar Alterações
    </button>

</form>

</body>
</html>