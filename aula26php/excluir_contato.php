<?php

require_once "config/database.php";

$id = $_GET['id'] ?? 0;

// Busca contato
$stmt = $pdo->prepare(
    'SELECT * FROM contatos WHERE id = ?'
);

$stmt->execute([$id]);

$contato = $stmt->fetch();

if (!$contato) {

    die('Contato não encontrado.');

}

// Confirma exclusão
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stmt = $pdo->prepare(
        'DELETE FROM contatos WHERE id = ?'
    );

    $stmt->execute([$id]);

    header('Location: index.php');
    exit;
}

include 'views/cabecalho.php';

?>

<div class="container">

    <h2>Excluir Contato</h2>

    <p>
        Deseja realmente excluir:
    </p>

    <p>
        <b><?php echo $contato['nome']; ?></b>
    </p>

    <form method="POST">

        <button type="submit">
            Confirmar Exclusão
        </button>

    </form>

</div>

</body>
</html>