<?php
session_start();
require_once("../../db/config.php");

// Será pego pelo ajax e repassado para cá
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// Aqui seria uma validação básica, acredito que não teria a necessidade, mas será executado apenas se os campos estiverem preenchidos.
if ($usuario != "" && $senha != "") {
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE username = :usuario AND password = :senha");
    $sql->bindValue(":usuario", $usuario);
    $sql->bindValue(":senha", md5($senha));
    $sql->execute();

    // Valido se é um agente que está logando e não é a primeira vez que entra, coloquei primeiro essa validão em vez da de baixo pois será mais comum um agente logar e não é sua primeira vez, então "melhora" a performace, mesmo que seja mínimo 
    if ($usuario != 'ADMIN' && $senha != "mudar123") {
        if ($sql->rowCount() > 0) {
            // Se os dados estiverem correto retornará o true para saber se está logado e somente assim o php entenderá que ele acertou a senha.
            $_SESSION['login'] = 'true';
            // Será usado essa variavel da sessão para armazenar em cache(localstorage após no JS), assim ficará menos código e menos processamento
            $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);
            // Aqui retorno true para a requisição AJAX para o JS redirecionar a página.
            echo json_encode('true');
        } else {
            // Se errar a senha ou o usuário atribuido.
            echo json_encode('false');
        }
    }
    // Valido se é um agente e se é a primeira vez que está logando (senha padrão)
    else if ($usuario != 'ADMIN' && $senha == "mudar123") {
        if ($sql->rowCount() > 0) {
            $_SESSION['login'] = 'true';
            $_SESSION['alterarSenha'] = 'true';
            $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);
            echo json_encode('mudarSenha');
        } else {
            // Se errar a senha ou o usuário atribuido.
            echo json_encode('false');
        }
    }
} else {
    // Se tentarem acessar o arquivo puro na URL mandará para o login
    header("Location: ../../index.php");
}
