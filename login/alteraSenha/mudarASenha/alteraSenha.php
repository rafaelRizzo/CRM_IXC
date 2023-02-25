<?php
require("../../../db/config.php");
session_start();

$agentId = $_POST['agent'];
$novaSenha = $_POST['novaSenha'];
$palavraSecreta = $_POST['palavraSecreta'];

$sql = $pdo->prepare("UPDATE usuarios SET password = :novaSenha, palavraSecreta = :palavraSecreta WHERE id = $agentId");
$sql->bindValue(":novaSenha", md5($novaSenha));
$sql->bindValue(":palavraSecreta", $palavraSecreta);
$sql->execute();


if ($sql->rowCount() > 0) {
    echo json_encode("true");
}else{
    echo json_encode("false");    
}

