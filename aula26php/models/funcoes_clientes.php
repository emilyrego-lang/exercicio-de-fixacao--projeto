<?php

function obterClientes(PDO $pdo): array {

    $stmt = $pdo->query(
        'SELECT * FROM clientes ORDER BY nome'
    );

    return $stmt->fetchAll();
}

function exibirTabelaClientes(array $clientes): void {

    if (empty($clientes)) {

        echo "<p>Nenhum cliente encontrado.</p>";

        return;
    }

    echo "<table border='1' cellpadding='10'>";

    echo "
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    ";

    foreach ($clientes as $cliente) {

        echo "
            <tr>

                <td>{$cliente['id']}</td>

                <td>{$cliente['nome']}</td>

                <td>{$cliente['cpf']}</td>

                <td>{$cliente['email']}</td>

                <td>{$cliente['telefone']}</td>

                <td>{$cliente['endereco']}</td>

                <td>
                    <a href='editar_cliente.php?id={$cliente['id']}'>
                        Editar
                    </a>
                </td>

                <td>
                    <a href='excluir_cliente.php?id={$cliente['id']}'>
                        Excluir
                    </a>
                </td>

            </tr>
        ";
    }

    echo "</table>";
}