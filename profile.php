<?php 

session_start();
require('config/database.php');
include('filters/auth_filter.php');
require('constants/functions.php');
require('i18n/local.php');
require('constants/constants.php');

if(!empty($_GET['id'])){
    $user = find_user_by_id($_GET['id']);

    if(!$user){
        redirect('index.php');
    }
}else {
    redirect('profile.php?id='.get_session('user_id'));
}

require('views/profile.view.php');

?>