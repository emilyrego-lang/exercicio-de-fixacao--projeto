<?php

function obterProdutos(PDO $pdo): array {

    $stmt = $pdo->query(
        "SELECT * FROM produtos ORDER BY id DESC"
    );

    return $stmt->fetchAll();
}

function exibirTabelaProdutos(array $produtos): void {

    echo "
    <table border='1' cellpadding='10' cellspacing='0' style='width:100%; border-collapse:collapse;'>

        <tr style='background:#333; color:white;'>

            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Imagem</th>
            <th>Editar</th>
            <th>Excluir</th>

        </tr>
    ";

    foreach($produtos as $produto){

        echo "<tr>";

        echo "<td>{$produto['id']}</td>";

        echo "<td>{$produto['nome']}</td>";

        echo "<td>{$produto['descricao']}</td>";

        echo "<td>R$ " . number_format(
            $produto['preco'],
            2,
            ',',
            '.'
        ) . "</td>";

        echo "<td>{$produto['estoque']}</td>";

        echo "<td>";

        if(!empty($produto['imagem'])){

            echo "
            <img 
                src='uploads/{$produto['imagem']}'
                width='80'
                height='80'
                style='
                    object-fit:cover;
                    border-radius:10px;
                    border:2px solid #ccc;
                '
            >";

        } else {

            echo "Sem imagem";

        }

        echo "</td>";

        echo "
        <td>
            <a href='editar_produto.php?id={$produto['id']}'>
                Editar
            </a>
        </td>";

        echo "
        <td>
            <a href='excluir_produto.php?id={$produto['id']}'>
                Excluir
            </a>
        </td>";

        echo "</tr>";
    }

    echo "</table>";
}

?>