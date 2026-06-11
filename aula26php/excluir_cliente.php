<?php

require_once "config/database.php";

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare(
    'SELECT * FROM clientes WHERE id = ?'
);

$stmt->execute([$id]);

$cliente = $stmt->fetch();

if (!$cliente) {

    die('Cliente não encontrado.');

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stmt = $pdo->prepare(
        'DELETE FROM clientes WHERE id = ?'
    );

    $stmt->execute([$id]);

    header('Location: clientes.php');
    exit;
}

include 'views/cabecalho.php';

?>

<div class="container">

    <h2>Excluir Cliente</h2>

    <p>
        Deseja excluir:
        <b><?php echo $cliente['nome']; ?></b> ?
    </p>

    <form method="POST">

        <button type="submit">
            Confirmar Exclusão
        </button>

    </form>

</div>

</body>
</html>