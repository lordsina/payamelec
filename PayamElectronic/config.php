<?php
define('SERVERNAME','localhost');
define('DB_NAME','payamelectronic');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('URL','http://localhost:801/');
session_start();
if(!isset($_SESSION['goods'])){
    $_SESSION['goods']=array();
}

try {
    $conn = new PDO("mysql:host=".SERVERNAME.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
    $conn->exec("set names utf8");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}