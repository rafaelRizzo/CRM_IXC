<?php
session_start();
session_destroy();
require_once("./db/config.php");


?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM - Login</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified CSS -->

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Google Fonts -->

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Icons -->

    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- CSS -->

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Jquery -->
</head>

<body>
    <main class="container-flex">
        <!-- Alerts -->
        <div class="container-alerts">
            <div class="dados-invalidos">
                <h6>Agente ou senha incorreto!</h6>
            </div>
            <div class="logado-sucesso">
                <h6>Logado com sucesso!</h6>
            </div>

            <div class="dados-altera-senha-invalidos">
                <h6>Agente ou palavra secreta incorreta!</h6>
            </div>
            <div class="dados-altera-senha-sucesso">
                <h6>Senha redefinida com sucesso!</h6>
            </div>
            <div class="dados-altera-senha-loop">
                <h6>A senha j?? ?? a padr??o, tente logar...</h6>
            </div>
        </div>
        <!-- Alerts -->

        <!-- Box left -->
        <section class="box-left">
            <!-- Form login -->
            <form>

                <!-- Boas vindas (dia/tarde/noite) -->
                <h6 id="boas-vindas"></h6>
                <!-- Boas vindas (dia/tarde/noite) -->

                <h2>
                    Bem-vindo de volta!
                </h2>

                <!-- Select agentes -->
                <div class="input-field col s12">
                    <select id="usuario">
                        <option value="">Selecione seu Agente</option>
                        <?php
                        // Script em php para popular o select de acordo com o banco

                        $sql = $pdo->prepare("SELECT id, username, agent, status FROM usuarios");
                        $sql->execute();

                        if ($sql->rowCount() > 0) {
                            $agents = $sql->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($agents as $ag) {
                                if ($ag['status'] != 0 && $ag['username'] != "ADMIN" && $ag['username'] != "TESTE") {
                                    echo "
                            <option value=" . $ag['username'] . ">"
                                        . $ag['username'] . " - " . $ag['agent'] .
                                        "</option>";
                                } else if ($ag['username'] == "ADMIN" || $ag['username'] == "TESTE") {
                                    echo "
                            <option value=" . $ag['username'] . ">"
                                        . $ag['username'] .
                                        "</option>";
                                }
                            }
                        } else {
                            echo "<option>Erro ao consultar usu??rios no banco!</option>";
                        }
                        ?>
                    </select>
                </div>
                <!-- Select agentes -->

                <!-- Container Senha -->
                <div>
                    <label for="senha"></label>
                    <input type="password" id="senha" placeholder="Digite sua senha" required>
                </div>
                <!-- Container Senha -->

                <!-- Esqueci minha senha -->
                <a class="modal-trigger" href="#redefinirSenha">Esqueci minha senha</a>

                <!-- Botao valida login -->
                <button type="submit">Entrar</button>
                <!-- Botao valida login -->
            </form>
            <!-- Form login -->

            <!-- Modal Structure -->
            <div id="redefinirSenha" class="modal">
                <div class="modal-content">
                    <h4>Redefini????o de senha</h4>
                    <!-- Select agentes -->
                    <div class="input-field col s12">
                        <select id="usuario-redefinicao-senha">
                            <option value="">Selecione seu Agente</option>
                            <?php
                            // Script em php para popular o select de acordo com o banco

                            $sql = $pdo->prepare("SELECT id, username, agent, status FROM usuarios");
                            $sql->execute();

                            if ($sql->rowCount() > 0) {
                                $agents = $sql->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($agents as $ag) {
                                    if ($ag['status'] != 0 && $ag['username'] != "ADMIN" && $ag['username'] != "TESTE") {
                                        echo "
                            <option value=" . $ag['username'] . ">"
                                            . $ag['username'] . " - " . $ag['agent'] .
                                            "</option>";
                                    } else if ($ag['username'] == "ADMIN" || $ag['username'] == "TESTE") {
                                        echo "
                            <option value=" . $ag['username'] . ">"
                                            . $ag['username'] .
                                            "</option>";
                                    }
                                }
                            } else {
                                echo "<option>Erro ao consultar usu??rios no banco!</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Select agentes -->

                    <div class="">
                        <!-- Container palavra secreta -->
                        <div>
                            <label for="palavra-secreta"></label>
                            <input type="text" id="palavra-secreta" placeholder="Digite sua palavra secreta." required>
                            <i>A palavra secreta foi criada assim que voc?? logou pela primeira vez, caso n??o lembre solicite que um supervisor(a) ou coordenador(a)!</i>
                        </div>
                        <!-- Container palavra secreta -->
                        <button id="btn-redefinir-senha">Redefinir senha</button>
                    </div>
                </div>
                <a href="#" class="red modal-close waves-effect waves-light btn-flat">X</a>
            </div>
            <!-- Esqueci minha senha -->

            <!-- Rodape -->
            <footer>
                &copy; Rafael Rizzo <span id="year"></span>
            </footer>
            <!-- Rodape -->
        </section>
        <!-- Box left -->

        <section class="box-right">
            <div class="box-top">.</div>
            <span class="circle-mid-container"></span>
            <div class="blur-bot">.</div>
        </section>
    </main>

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
        <p>Validando informa????es</p>
    </div>
    <!-- Loader -->

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="./login/js/script.js"></script>
    <script src="./login/validaLogin/ajax.js"></script>
    <script src="./login/redefinirSenha/ajax.js"></script>
</body>

</html>