<?php 

    $authorized_languages = ['fr', 'en', 'es'];
    if(isset($_GET['lang']) && in_array($_GET['lang'], $authorized_languages)){
        $_SESSION['locale'] = $_GET['lang'];
    }else {
        if(empty($_SESSION['locale'])){
            $_SESSION['locale'] = $authorized_languages[0];
        }
    }

    require('locales/menu.php');
    require('locales/long_text.php')

?>