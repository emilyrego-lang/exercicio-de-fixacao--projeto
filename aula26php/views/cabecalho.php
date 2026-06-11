<!-- cabecalho.php -->

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <title>Sistema de Contatos</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:Arial, Helvetica, sans-serif;
            background:#f4f4f4;
            color:#222;
            transition:0.3s;
        }

        /* NAVBAR */

        .navbar{
            background:#1f1f1f;
            padding:18px 30px;

            display:flex;
            justify-content:space-between;
            align-items:center;

            box-shadow:0 2px 10px rgba(0,0,0,0.2);
        }

        /* MENU */

        .menu{
            display:flex;
            gap:15px;
        }

        .menu a{
            color:white;
            text-decoration:none;
            font-weight:bold;

            padding:10px 18px;

            border:2px solid #444;
            border-radius:10px;

            background:#2b2b2b;

            transition:0.3s;
        }

        .menu a:hover{

            border-color:#4da6ff;
            color:#4da6ff;

            background:#333;

            transform:translateY(-2px);

            box-shadow:0 0 12px rgba(77,166,255,0.5);
        }

        /* BOTÃO DARK MODE */

        #themeToggle{
            background:#333;
            color:white;
            border:none;
            padding:10px 14px;
            border-radius:8px;
            cursor:pointer;
            font-size:16px;
            transition:0.3s;
        }

        #themeToggle:hover{
            background:#555;
            transform:scale(1.05);
        }

        /* CONTAINER */

        .container{
            padding:30px;
        }

        h1{
            margin-bottom:20px;
        }

        /* TABELA */

        table{
            width:100%;
            border-collapse:collapse;
            background:white;

            border-radius:10px;
            overflow:hidden;

            box-shadow:0 2px 10px rgba(0,0,0,0.1);
        }

        th{
            background:#222;
            color:white;
            padding:14px;
            text-align:left;
        }

        td{
            padding:12px;
            border-bottom:1px solid #ddd;
        }

        tr:hover{
            background:#f5f5f5;
        }

        /* BOTÕES */

        .btn{
            padding:8px 14px;
            border-radius:6px;
            text-decoration:none;
            color:white;
            font-weight:bold;
            transition:0.3s;
            display:inline-block;
        }

        /* NOVO */

        .novo{
            background:#3498db;
        }

        .novo:hover{
            background:#2980b9;
            transform:scale(1.05);
        }

        /* EDITAR */

        .editar{
            background:#2ecc71;
        }

        .editar:hover{
            background:#27ae60;
            transform:scale(1.05);
        }

        /* EXCLUIR */

        .excluir{
            background:#e74c3c;
        }

        .excluir:hover{
            background:#c0392b;
            transform:scale(1.05);
        }

        /* RODAPÉ */

        .rodape{
            background:#1f1f1f;
            color:white;
            text-align:center;
            padding:20px;
            margin-top:40px;
        }

        /* DARK MODE */

        .dark-mode{
            background:#121212;
            color:white;
        }

        .dark-mode table{
            background:#1e1e1e;
            color:white;
        }

        .dark-mode td{
            border-color:#444;
        }

        .dark-mode tr:hover{
            background:#2a2a2a;
        }

        .dark-mode th{
            background:#000;
        }

        .dark-mode .navbar,
        .dark-mode .rodape{
            background:#000;
        }

        .dark-mode .menu a{
            background:#1e1e1e;
            border-color:#555;
        }

        .dark-mode .menu a:hover{
            border-color:#4da6ff;
            color:#4da6ff;
        }
 /* BOTÃO NOVO CONTATO */

.btn{
    display:inline-block;
    padding:10px 18px;
    border-radius:10px;

    text-decoration:none;
    font-weight:bold;

    transition:0.3s;
}

.novo{
    background:#3498db;
    color:white;

    border:2px solid #3498db;
}

.novo:hover{

    background:#2980b9;
    border-color:#2980b9;

    transform:translateY(-2px);

    box-shadow:0 0 10px rgba(52,152,219,0.5);
}
    </style>

</head>

<body>

    <!-- MENU -->

    <div class="navbar">

        <div class="menu">

        <a href="index.php?pagina=contatos">Contatos</a>

        <a href="index.php?pagina=clientes">Clientes</a>

        <a href="index.php?pagina=produtos">Produtos</a>
        
        </div>

        <button id="themeToggle">🌙</button>

    </div>

    <!-- CONTEÚDO -->

    <div class="container">