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
    <title>Document</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        :root {
            --purple2: #826AED;
            --purple1: #C879FF;

            --purple: #51414F;
            --purple-soft: #685465;
            --purple-light: #E6E6FA;

            --white: #F6F6F6;

            --red: #B70000;
            --red-light: #c04f4f;

            --green: #3f613f;
            --green-light2: #516951;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--white);
            overflow-x: hidden;
            min-height: 100vh;
        }

        .fixed-action-btn .btn-floating.btn-large {
            background-color: var(--purple1);
        }

        .fixed-action-btn ul li a.btn-floating {
            background-color: var(--purple2);
        }

        .input-field {
            margin-top: 0;
        }
    </style>

    <!-- Seta o nome do agente no localstorage (Só expira quando fecha a página) -->
    <script>
        localStorage.setItem("agente", "<?php echo $_SESSION['user']['agent']; ?>")
    </script>
    <!-- Seta o nome do agente no localstorage (Só expira quando fecha a página) -->
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
            <a class="btn-floating btn-large waves-effect waves-light pulse">
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
                <a class="btn-floating yellow darken-2 tooltipped waves-effect waves-light" data-position="left" data-tooltip="Informativos">
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
                <a class="btn-floating tooltipped waves-effect waves-light" data-position="left" data-tooltip="Minha conta">
                    <i class="material-icons">person_outline</i>
                </a>
            </li>
        </ul>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./js/materialize.js"></script>
    <script src="./js/reqEmpresas.js"></script>
</body>

</html>
