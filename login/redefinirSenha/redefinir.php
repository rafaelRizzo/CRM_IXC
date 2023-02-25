<?php
session_start();
require_once("../../db/config.php");

// Será pego pelo ajax e repassado para cá
$redefinindoAgente = $_POST['redefinindoAgente'];
$palavraSecretaAgente = $_POST['palavraSecretaAgente'];

if ($redefinindoAgente != "" && $palavraSecretaAgente != "") {
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE username = :redefinindoAgente AND palavraSecreta = :palavraSecretaAgente");
    $sql->bindValue(":redefinindoAgente", $redefinindoAgente);
    $sql->bindValue(":palavraSecretaAgente", $palavraSecretaAgente);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $sql = $pdo->prepare("UPDATE usuarios SET password = :senha WHERE username = '$redefinindoAgente'");
        $sql->bindValue(":senha", md5('mudar123'));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            echo json_encode("true");
        } else {
            echo json_encode("senha-ja-redefinida");
        }
    } else {
        echo json_encode("false");
    }
} else {
    // Se tentarem acessar o arquivo puro na URL mandará para o login
    header("Location: ../../index.php");
}
