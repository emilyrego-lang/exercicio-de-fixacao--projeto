<?php

require_once "config/database.php";
include_once "models/funcoes.php";
include "views/cabecalho.php";

// Busca contatos
$contatos = obterContatos($pdo);

?>

<div class="container">

    <h2>Lista de Contatos</h2>

    <p>
        <a href="cadastro_contato.php">
            Novo Contato
        </a>
    </p>

    <table border="1" cellpadding="10">

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>

        <?php foreach ($contatos as $contato) { ?>

            <tr>

                <td>
                    <?php echo $contato['id']; ?>
                </td>

                <td>
                    <?php echo $contato['nome']; ?>
                </td>

                <td>
                    <?php echo $contato['email']; ?>
                </td>

                <td>
                    <?php echo $contato['telefone']; ?>
                </td>

                <td>
                    <a href="editar_contato.php?id=<?php echo $contato['id']; ?>">
                        Editar
                    </a>
                </td>

                <td>
                    <a href="excluir_contato.php?id=<?php echo $contato['id']; ?>">
                        Excluir
                    </a>
                </td>

            </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>