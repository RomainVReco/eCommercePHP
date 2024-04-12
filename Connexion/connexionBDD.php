<?php
require_once(__DIR__  . "/config.php");
require_once(__DIR__ . "/db_config_access.php");

try {
    $mysqlClient = new PDO(
        sprintf('mysql:host=%s;dbname=%s;port=%s;charset=utf8', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
        MYSQL_USER,
        MYSQL_PASSWORD
    );
} catch (Exception $exception) {
    die('Erreur : ' . $exception->getMessage());
}