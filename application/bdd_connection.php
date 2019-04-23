<?php

$dsn = 'mysql:host=localhost;dbname=forumofi';
$username = 'root';
$password = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

$pdo = new PDO($dsn, $username, $password, $options);

// l'id de l'utilisateur courant
$idUserSource = 1;
?>
	