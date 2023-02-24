<?php
session_start();

if ($_SESSION['alterarSenha'] != "true") {
    header("Location: ../../");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM - Troca de Senha</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified CSS -->

    <link rel="stylesheet" href="./css/style.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Google Fonts -->

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Icons -->

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Jquery -->
</head>

<body>
    <div class="container">        
        <!-- Alerts -->
        <div class="container-alerts">
            <div class="dados-invalidos">
                <h6>Campo inválido!</h6>
            </div>
            <div class="logado-sucesso">
                <h6>Logado com sucesso!</h6>
            </div>
        </div>
        <!-- Alerts -->

        <form class="form1">
            <div class="box-img">
                <img src="./img/key.svg" alt="">
            </div>
            <h1><?php echo $_SESSION['user']['agent']; ?></h1>
            <h2>Altere a sua senha!</h2>
            <h4>Para sua segurança, mude a senha padrão de acesso.</h4>

            <input type="password" id="senha1" placeholder="Digite sua nova senha" autocomplete="off">
            <input type="password" id="senha2" placeholder="Digite novamente sua nova senha" autocomplete="off">

            <button>Avançar</button>
        </form>

        <form class="form2">
            <div class="box-img">
                <img src="./img/question.svg" alt="">
            </div>
            <h1><?php echo $_SESSION['user']['agent']; ?></h1>
            <h2>Escolha uma palavra secreta!</h2>
            <h4>Será utilizada quando você perder a sua senha e conseguir redefini-la sozinho(a).</h4>

            <input type="text" id="palavraSecreta" placeholder="Palavra secreta" autocomplete="off">

            <button>Enviar</button>
        </form>
    </div>

    <!-- Loader -->
    <div class="container-loader">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-purple-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Validando informações</p>
    </div>
    <!-- Loader -->
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="./mudarASenha/ajax.js"></script>
</body>

</html>