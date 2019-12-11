<?php 

define('DB_HOST', 'localhost');
define('DB_NAME', 'devNetwork');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');

try{
    $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $db->query('SELECT * FROM users');
    
}catch(PDOException $e) {
    die('Erreur'. $e->getMessage());
}

?>