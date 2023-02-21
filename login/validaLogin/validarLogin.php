<?php
session_start();
require_once("../../db/config.php");

if ($username != "ADMIN") {
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE username = :username AND password = :senha");
    $sql->bindValue("username", $username);
    $sql->bindValue("senha", md5($senha));
    $sql->execute();

    if ($senha != "mudar123" && $sql->rowCount() > 0) {
        // Aqui defino que o login será true pois ele acertou a senha
        $_SESSION['login'] = 'true';
        // Já aqui armazeno na variavel de sessão para guardar as informações do agente, que poderá ser usado em outra página enquanto ele estiver logado.
        $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);
        echo json_encode('true');
    } else if ($senha == "mudar123" && $sql->rowCount() > 0) {
        // Aqui defino que o login será true pois ele acertou a senha mas será tratado no retorno pois é o primeiro acesso
        $_SESSION['login'] = 'true';
        // Já aqui armazeno na variavel de sessão para guardar as informações do agente, que poderá ser usado em outra página enquanto ele estiver logado.
        $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);
        echo json_encode('altereASenha');
    } else {
        // Chegará aqui se errar a senha e o retorno será tratado no ajax
        $_SESSION['login'] = 'false';
        echo json_encode('false');
    }
}
