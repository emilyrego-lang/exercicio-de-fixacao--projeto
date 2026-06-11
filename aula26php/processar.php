<?php
// processar.php
$nome  = $_POST["nome"]  ?? "";
$email = $_POST["email"] ?? "";

echo "<p>Olá, <b>$nome</b>! Você usou o e-mail: $email</p>";
?>