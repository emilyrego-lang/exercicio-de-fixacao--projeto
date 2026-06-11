<?php

require_once "config/database.php";
include 'views/cabecalho.php';
include_once 'models/funcoes_clientes.php';

$clientes = obterClientes($pdo);

?>

<div class="container">

    <h2>Lista de Clientes</h2>

    <p>
        <a href="cadastro_cliente.php">
            Novo Cliente
        </a>
    </p>

    <?php

    exibirTabelaClientes($clientes);

    ?>

</div>

</body>
</html>