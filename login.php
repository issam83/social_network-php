<?php 
session_start();
include('filters/guest_filter.php');
require('config/database.php');
require('constants/functions.php');
require('i18n/local.php');
require('constants/constants.php');


if(isset($_POST['login'])){
    if(not_empty(['identifiant', 'password'])){

        // $errors = [];

        extract($_POST);

        $q = $db->prepare("SELECT id, pseudo, password AS hashed_password, email FROM users 
                            WHERE (pseudo = :identifiant OR email = :identifiant)
                            AND active = '0'");
        
        $q->execute([
            'identifiant' => $identifiant,
        ]);

        $user = $q->fetch(PDO::FETCH_OBJ);

        if($user && bcrypt_verify_password($password, $user->hashed_password)){

            $_SESSION['user_id'] = $user->id;
            $_SESSION['pseudo'] = $user->pseudo;
            $_SESSION['email'] = $user->email;

            redirect_intention('profile.php?id='.$user->id);
        }else {
            set_flash('identifiant ou mot de passe incorrecte', 'danger');
            save_input_data();
        }

    }
}else {
    clear_input_data();
}


?>


<?php 

require('views/login.view.php')

?>