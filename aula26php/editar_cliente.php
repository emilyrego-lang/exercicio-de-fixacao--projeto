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
        'UPDATE clientes
         SET nome = ?, cpf = ?, email = ?,
             telefone = ?, endereco = ?
         WHERE id = ?'
    );

    $stmt->execute([
        $_POST['nome'],
        $_POST['cpf'],
        $_POST['email'],
        $_POST['telefone'],
        $_POST['endereco'],
        $id
    ]);

    header('Location: clientes.php');
    exit;
}

include 'views/cabecalho.php';

?>

<div class="container">

    <h2>Editar Cliente</h2>

    <form method="POST">

        <input type="text" name="nome"
        value="<?php echo $cliente['nome']; ?>">

        <input type="text" name="cpf"
        value="<?php echo $cliente['cpf']; ?>">

        <input type="email" name="email"
        value="<?php echo $cliente['email']; ?>">

        <input type="text" name="telefone"
        value="<?php echo $cliente['telefone']; ?>">

        <input type="text" name="endereco"
        value="<?php echo $cliente['endereco']; ?>">

        <button type="submit">
            Salvar
        </button>

    </form>

</div>

</body>
</html>