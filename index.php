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
        <section class="box-left">
            <form>

                <h6 id="boas-vindas"></h6>

                <h2>
                    Bem-vindo de volta!
                </h2>

                <div class="input-field col s12">
                    <select id="usuario">
                        <option value="" disabled selected>Selecione seu Agente</option>
                        <?php
                        require_once("./db/config.php");
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
                            echo "<option>Erro ao consultar usuários no banco!</option>";
                        }
                        ?>
                    </select>
                </div>


                <div>
                    <label for="senha"></label>
                    <input type="password" id="senha" placeholder="Digite sua senha">
                </div>

                <button type="submit">Entrar</button>
            </form>
            <footer>
                &copy; Rafael Rizzo <span id="year"></span>
            </footer>
        </section>

        <section class="box-right">
            <div class="box-top">.</div>
            <span class="circle-mid-container"></span>
            <div class="blur-bot">.</div>
        </section>
    </main>




    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        let date = new Date()
        document.querySelector("#year").innerHTML = `~ ${date.getFullYear()}`

        function getHoraBoasVindas() {
            let date = new Date()
            if (date.getHours() >= 0 && date.getHours() < 12) {
                document.querySelector("#boas-vindas").innerHTML = "Bom dia!"
            } else if (date.getHours() >= 12 && date.getHours() < 18) {
                document.querySelector("#boas-vindas").innerHTML = "Boa tarde!"
            } else if (date.getHours() >= 18 && date.getHours() <= 23) {
                document.querySelector("#boas-vindas").innerHTML = "Boa noite!"
            }
        }
        getHoraBoasVindas()
        setInterval(() => {
            getHoraBoasVindas()
        }, 1000);
        document.querySelector("#boas-vindas").innerHTML


        $(document).ready(function() {
            $('select').formSelect();
        });
    </script>

</body>

</html>