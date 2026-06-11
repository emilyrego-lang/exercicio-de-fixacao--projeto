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

$erro = '';

// Atualiza
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    if (!$nome || !$email) {

        $erro = 'Nome e e-mail obrigatórios.';

    } else {

        $stmt = $pdo->prepare(
            'UPDATE contatos
             SET nome = ?, email = ?, telefone = ?
             WHERE id = ?'
        );

        $stmt->execute([
            $nome,
            $email,
            $telefone,
            $id
        ]);

        header('Location: index.php');
        exit;
    }
}

include 'views/cabecalho.php';

?>

<div class="container">

    <h2>Editar Contato</h2>

    <?php if ($erro != '') { ?>

        <div class="erro">
            <?php echo $erro; ?>
        </div>

    <?php } ?>

    <form method="POST">

        <input
            type="text"
            name="nome"
            value="<?php echo $contato['nome']; ?>"
        >

        <input
            type="email"
            name="email"
            value="<?php echo $contato['email']; ?>"
        >

        <input
            type="text"
            name="telefone"
            value="<?php echo $contato['telefone']; ?>"
        >

        <button type="submit">
            Salvar
        </button>

    </form>

</div>

</body>
</html>