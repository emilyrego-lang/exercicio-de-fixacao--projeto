<?php

require_once "config/database.php";

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    // VALIDAÇÃO
    if (!$nome || !$email) {

        $erro = 'Nome e e-mail são obrigatórios.';

    } else {

        // PREPARED STATEMENT
        $stmt = $pdo->prepare(
            'INSERT INTO contatos (nome, email, telefone)
             VALUES (?, ?, ?)'
        );

        $stmt->execute([
            $nome,
            $email,
            $telefone
        ]);

        // REDIRECIONA
        header('Location: index.php');
        exit;
    }
}

include 'views/cabecalho.php';

?>

<div class="container">

    <h2>Cadastrar Contato</h2>

    <?php if ($erro != '') { ?>

        <div class="erro">
            <?php echo $erro; ?>
        </div>

    <?php } ?>

    <form action="" method="POST">

        <input
            type="text"
            name="nome"
            placeholder="Digite o nome"
        >

        <input
            type="email"
            name="email"
            placeholder="Digite o e-mail"
        >

        <input
            type="text"
            name="telefone"
            placeholder="Digite o telefone"
        >

        <button type="submit">
            Cadastrar
        </button>

    </form>

</div>

</body>
</html>