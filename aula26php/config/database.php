<?php
// database.php — configurações do banco de dados

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'agenda');

try {

    $dsn = 'mysql:host=' . DB_HOST .
           ';dbname=' . DB_NAME .
           ';charset=utf8mb4';

    $pdo = new PDO($dsn, DB_USER, DB_PASS, [

        // Mostra erros como exceções
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

        // Retorna arrays associativos
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

        // Desativa emulação de prepared statements
        PDO::ATTR_EMULATE_PREPARES => false,

    ]);

} catch (PDOException $e) {

    die('Erro de conexão: ' . $e->getMessage());

}

/*
Diferença entre:

PDO::ERRMODE_EXCEPTION
→ lança exceções e mostra erros de forma controlada.

PDO::ERRMODE_SILENT
→ não mostra erros automaticamente.
*/