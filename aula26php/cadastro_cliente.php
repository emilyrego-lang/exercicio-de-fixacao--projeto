<?php

require_once "config/database.php";

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $cpf = trim($_POST['cpf'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');

    // VALIDAR CPF
    if (!preg_match('/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/', $cpf)) {

        $erro = 'CPF inválido. Use 000.000.000-00';

    } else {

        $stmt = $pdo->prepare(
            'INSERT INTO clientes
            (nome, cpf, email, telefone, endereco)
            VALUES (?, ?, ?, ?, ?)'
        );

        $stmt->execute([
            $nome,
            $cpf,
            $email,
            $telefone,
            $endereco
        ]);

        header('Location: clientes.php');
        exit;
    }
}

include 'views/cabecalho.php';

?>

<div class="container">

    <h2>Cadastrar Cliente</h2>

    <?php if ($erro != '') { ?>

        <div class="erro">
            <?php echo $erro; ?>
        </div>

    <?php } ?>

    <form method="POST">

        <input
            type="text"
            name="nome"
            placeholder="Nome"
            required
        >

        <input
            type="text"
            name="cpf"
            placeholder="000.000.000-00"
            required
        >

        <input
            type="email"
            name="email"
            placeholder="E-mail"
            required
        >

        <input
            type="text"
            name="telefone"
            placeholder="Telefone"
        >

        <input
            type="text"
            name="endereco"
            placeholder="Endereço"
        >

        <button type="submit">
            Cadastrar
        </button>

    </form>

</div>

</body>
</html>