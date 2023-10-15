<?php

require_once 'env.php';


function connect()
{

    $host = getenv("DB_HOST");
    $db   = getenv("DB_NAME");
    $user = getenv("DB_USER");
    $pass = getenv("DB_PASS");

    $dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";

    try{
        $pdo  = new PDO($dsn, $user, $pass, 

        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $pdo;
        
    } catch(PDOException $e){
        echo '接続失敗です！' . $e->getMessage();
        exit();
        
    }
 
}


