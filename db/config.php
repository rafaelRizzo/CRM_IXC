<?php
$db_name = '';
$db_host = '';
$db_user = '';
$db_password = '';
try {
    $pdo = new PDO("mysql:dbname=" . $db_name . ";host=" . $db_host, $db_user, $db_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (PDOException $pe) {
    die("Não foi possível se conectar ao banco de dados $db_name :" . $pe->getMessage());
}
