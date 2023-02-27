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
    <title>CRM - Suporte</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified CSS -->

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Icons -->

    <!-- CSS -->
    <link rel="stylesheet" href="../css/cores.css">
    <link rel="stylesheet" href="../css/modais/style.css">
    <link rel="stylesheet" href="../css/recolor.css">
    <link rel="stylesheet" href="./css/style.css">

    <!-- CSS -->

    <!-- Seta o nome do agente no localstorage (Só expira quando fecha a página) -->
    <script>
        localStorage.setItem("agente", "<?php echo $_SESSION['user']['agent']; ?>")
    </script>
    <!-- Seta o nome do agente no localstorage (Só expira quando fecha a página) -->

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Jquery -->
</head>

<body>
    <div class="input-field col s12">
        <select id="empresa">
            <option value="" selected disabled>Selecione a empresa que está atendendo.</option>
            <option id="carregando-empresas" value="" disabled>Carregando... aguarde</option>
        </select>
    </div>

    <!-- Botão mais -->
    <div class="fixed-action-btn">
        <div class="container-helper">
            <a class="btn-floating btn-large waves-effect waves-light">
                <i class="large material-icons">add</i>
            </a>
        </div>
        <ul>
            <li>
                <a class="btn-floating tooltipped waves-effect waves-light" data-position="left" data-tooltip="Resetar">
                    <i class="material-icons">refresh</i>
                </a>
            </li>
            <li>
                <a class="btn-floating tooltipped waves-effect waves-light" data-position="left" data-tooltip="DarkMode">
                    <i class="material-icons">brightness_4</i>
                </a>
            </li>
            <li>
                <a class="btn-floating red darken-4 tooltipped waves-effect waves-light" data-position="left" data-tooltip="Informativos">
                    <i class="material-icons">warning</i>
                </a>
            </li>
            <li>
                <a class="btn-floating tooltipped waves-effect waves-light" data-position="left" data-tooltip="Exportar dados pessoais">
                    <i class="material-icons">import_export</i>
                </a>
            </li>
            <li>
                <a class="btn-floating tooltipped waves-effect waves-light" data-position="left" data-tooltip="Prazo da empresa">
                    <i class="material-icons">access_time</i>
                </a>
            </li>
            <li>
                <a class="btn-floating tooltipped waves-effect waves-light" data-position="left" data-tooltip="Documentos da empresa">
                    <i class="material-icons">content_paste</i>
                </a>
            </li>
            <li>
                <a class="btn-floating tooltipped waves-effect waves-light" data-position="left" data-tooltip="Sincronizar empresas">
                    <i class="material-icons">sync</i>
                </a>
            </li>
            <li>
                <a class="btn-floating tooltipped waves-effect waves-light modal-trigger" href="#minha-conta" data-position="left" data-tooltip="Minha conta">
                    <i class="material-icons">person_outline</i>
                </a>
            </li>
        </ul>
    </div>

    <!-- Modais -->

    <!-- Modal Minha Conta -->
    <div id="minha-conta" class="modal">
        <div class="modal-content center">
            <h4>Minha conta</h4>
            <p id=""><?php echo $_SESSION['user']['agent']; ?></p>
        </div>
        <div class="modal-footer">
            <button id="salvar-alteracoes-login" class="modal-close waves-effect waves-light btn-flat green">Salvar</button>
            <button class="modal-close waves-effect waves-light btn-flat red">Fechar</button>
        </div>
    </div>
    <!-- Modal Minha Conta -->

    <!-- Modais -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/reqEmpresas.js"></script>
    <script src="../js/informativo.js"></script>
</body>

</html>