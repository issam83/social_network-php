<?php 

session_start();
require('config/database.php');
require('constants/functions.php');
require('i18n/local.php');
require('constants/constants.php');

$q = $db->query("SELECT id, pseudo, email FROM users ORDER BY pseudo");
$users = $q->fetchAll(PDO::FETCH_OBJ);


require('views/list_users.view.php');

?>