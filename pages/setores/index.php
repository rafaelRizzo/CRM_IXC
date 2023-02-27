<?php
session_start();

// Validação para não conseguirem acessar a URL diretamente (sem logar).
if ($_SESSION['login'] != 'true') {
    header("Location: ../../index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM - SETORES</title>

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Icons -->

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Google Fonts -->

    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- CSS -->

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Jquery -->
</head>

<body>

    <ul>
        <li>
            <a href="../suporte">
                <i class="material-icons">build</i>
                <span>Suporte</span>
            </a>
        </li>
        <li>
            <a href="../financeiro">
                <i class="material-icons">attach_money</i>
                <span>Financeiro</span>
            </a>
        </li>
        <li>
            <a href="../comercial">
                <i class="material-icons">person</i>
                <span>Comercial</span>
            </a>
        </li>
    </ul>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>