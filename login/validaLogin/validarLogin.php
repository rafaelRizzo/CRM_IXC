<?php
session_start();
require_once("../../db/config.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

if ($usuario != "" && $senha != "") {
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE username = :usuario AND password = :senha");
    $sql->bindValue(":usuario", $usuario);
    $sql->bindValue(":senha", md5($senha));
    $sql->execute();
    if ($usuario != 'ADMIN' && $senha != "mudar123") {
        if ($sql->rowCount() > 0) {
            $_SESSION['login'] = 'true';
            $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);
            echo json_encode('true');
        } else {
            echo json_encode('false');
        }
    } else if ($usuario != 'ADMIN' && $senha == "mudar123") {
        if ($sql->rowCount() > 0) {
            $_SESSION['login'] = 'true';
            $_SESSION['alterarSenha'] = 'true';
            $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);
            echo json_encode('mudarSenha');
        } else {
            echo json_encode('false');
        }
    }
}
