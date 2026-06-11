<?php

require_once "config/database.php";


$erro = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = trim($_POST["nome"] ?? "");
    $descricao = trim($_POST["descricao"] ?? "");
    $preco = $_POST["preco"] ?? 0;
    $estoque = $_POST["estoque"] ?? 0;

    $imagem = '';

    // UPLOAD DA IMAGEM

    if(!empty($_FILES["imagem"]["name"])){

        $extensao = pathinfo(
            $_FILES["imagem"]["name"],
            PATHINFO_EXTENSION
        );

        $permitidos = ["jpg", "jpeg", "png", "webp"];

        if(!in_array(strtolower($extensao), $permitidos)){

            $erro = "Tipo de imagem não permitido.";

        } else {

            $nomeArquivo =
                uniqid("prod_") . "." . $extensao;

            move_uploaded_file(
                $_FILES["imagem"]["tmp_name"],
                "uploads/" . $nomeArquivo
            );
        }
    }

    // VALIDAÇÕES

    if($preco <= 0){

        $erro = "Preço inválido.";

    } elseif($estoque < 0){

        $erro = "Estoque inválido.";
    }

    // INSERT

    if($erro == ""){

        $stmt = $pdo->prepare(
            "INSERT INTO produtos
            (nome, descricao, preco, estoque, imagem)
            VALUES (?, ?, ?, ?, ?)"
        );

        $stmt->execute([
            $nome,
            $descricao,
            $preco,
            $estoque,
            $imagem
        ]);

        header("Location: produtos.php");

        exit;
    }
}

include 'views/cabecalho.php';

?>

<h1>Cadastro de Produto</h1>

<?php if($erro != "") { ?>

<p style="color:red;">
    <?php echo $erro; ?>
</p>

<?php } ?>

<form method="POST" enctype="multipart/form-data">

    <input
        type="text"
        name="nome"
        placeholder="Nome"
        required
    >

    <br><br>

    <textarea
        name="descricao"
        placeholder="Descrição"
    ></textarea>

    <br><br>

    <input
        type="number"
        step="0.01"
        name="preco"
        placeholder="Preço"
        required
    >

    <br><br>

    <input
        type="number"
        name="estoque"
        placeholder="Estoque"
        required
    >

    <br><br>

    <input
        type="file"
        name="imagem"
    >

    <br><br>

    <button type="submit">
        Cadastrar
    </button>

</form>