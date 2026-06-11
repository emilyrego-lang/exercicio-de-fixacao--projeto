<?php

require_once "config/database.php";

include 'views/cabecalho.php';

include_once 'models/funcoes_produtos.php';

$produtos = obterProdutos($pdo);

?>

<h1>Produtos</h1>

<a href="cadastro_produto.php" class="btn novo">
    ➕ Novo Produto
</a>

<br><br>

<?php

exibirTabelaProdutos($produtos);

?>