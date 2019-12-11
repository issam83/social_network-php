<?php 
session_start();

include('filters/guest_filter.php');
require('config/database.php');
require('constants/functions.php');
require('i18n/local.php');
require('constants/constants.php');


if(isset($_POST['register'])){
    if(not_empty(['name', 'pseudo', 'email', 'password', 'password_confirm'])){

        $errors = [];

        extract($_POST);

        if(mb_strlen($pseudo) < 3){
            $errors[] = 'Votre pseudo doit contenir au minimum 3 caractères';
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = 'Adresse email non valide';
        }

        if(mb_strlen($password) < 6){
            $errors[] = 'Votre mot de passe doit contenir au minimum 6 caractères';
        }else {
            if($password != $password_confirm){
                $errors[] = 'Les deux mots de passe ne concordent pas';
            }
        }

        if(is_already_in_use('pseudo', $pseudo, 'users')){
            $errors[] = 'Pseudo déjà utilisé';
        }

        if(is_already_in_use('email', $email, 'users')){
            $errors[] = 'Email déjà utilisé';
        }

        if(count($errors) == 0){
            $to = $email;
            $subject = WEBSITE_NAME.' - ACTIVATION DE COMPTE';
            // $password = sha1($password);
            $token = sha1($pseudo.$email.$password);

            ob_start();
            require('templates/email/activation.tmpl.php');
            $content = ob_get_clean();

            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            mail($to, $subject, $content, $headers);

            set_flash("Mail d'activation envoyé", 'success');

            $q = $db->prepare("INSERT INTO users(name, pseudo, email, password) 
                        VALUES(:name, :pseudo, :email, :password)");

            $q->execute([
                'name' => $name,
                'pseudo' => $pseudo,
                'email' => $email,
                'password' => bcrypt_hash_password($password)
            ]);

            redirect('index.php');

        }else {
            save_input_data();
        }
    }else {
        $errors[] = 'Veuillez remplir tout les champs';
        save_input_data();

    }
}else {
    clear_input_data();
}

?>

<?php require('views/register.view.php')?>