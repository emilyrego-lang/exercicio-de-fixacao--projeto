<?php

$pagina = $_GET['pagina'] ?? 'contatos';

switch ($pagina) {

    case 'clientes':
        include 'clientes.php';
        break;

    case 'produtos':
        include 'produtos.php';
        break;

    case 'contatos':
    default:
        include 'contatos.php';
        break;
}