<?php
$cidade = $_GET["cidade"] ?? "não informada";
$uf     = $_GET["uf"]     ?? "--";
?>

<h1>

    Buscando em: <?= $cidade ?> - <?= $uf ?>

</h1>

<style>

    body{
        font-family: Georgia, serif;
    }
    
    h1{
        color: #0077b6;
    }

</style>