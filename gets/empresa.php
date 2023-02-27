<?php
include_once("../db/config.php");

$sql = $pdo->prepare("SELECT * FROM empresas WHERE status != 0");
$sql->execute();

if ($sql->rowCount() > 0) {
    echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
} else {
    echo json_encode('false');
}
