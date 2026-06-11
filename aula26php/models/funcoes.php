<?php

function obterContatos(
    PDO $pdo,
    string $busca = "",
    int $pagina = 1,
    int $porPagina = 10
): array {

    $offset = ($pagina - 1) * $porPagina;

    $termo = "%" . $busca . "%";

    $stmt = $pdo->prepare(
        "SELECT * FROM contatos
        WHERE nome LIKE ?
        OR email LIKE ?
        ORDER BY id ASC
        LIMIT ? OFFSET ?"
    );

    $stmt->execute([
        $termo,
        $termo,
        $porPagina,
        $offset
    ]);

    return $stmt->fetchAll();
}

function contarContatos(
    PDO $pdo,
    string $busca = ""
): int {

    $termo = "%" . $busca . "%";

    $stmt = $pdo->prepare(
        "SELECT COUNT(*) as total
        FROM contatos
        WHERE nome LIKE ?
        OR email LIKE ?"
    );

    $stmt->execute([
        $termo,
        $termo
    ]);

    $resultado = $stmt->fetch();

    return $resultado["total"];
}