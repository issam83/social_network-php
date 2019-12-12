<?php 

session_start();
include('filters/auth_filter.php');
require('config/database.php');
require('constants/functions.php');
require('i18n/local.php');
require('constants/constants.php');

if(!empty($_GET['id']) && $_GET['id'] === get_session('user_id')){
    $user = find_user_by_id($_GET['id']);

    if(!$user){
        redirect('index.php');
    }
}else {
    redirect('profile.php?id='.get_session('user_id'));
}

if(isset($_POST['update'])){

    $errors = [];
    
    if(not_empty(['name', 'city', 'sex', 'country', 'bio'])){
        extract($_POST);

        $q = $db->prepare("UPDATE users 
                            SET name = :name, city = :city, sex = :sex, country = :country, 
                            bio = :bio, twitter = :twitter, github = :github,
                            available_for_hiring = :available_for_hiring, bio = :bio,
                            WHERE id = :id ");
                            
        
        $q->execute([
            'name' => $name,
            'city' => $city,
            'country' => $country,
            'sex' => $sex,
            'twitter' => $twitter,
            'github' => $github,
            'available_for_hiring' => !empty($available_for_hiring) ? '1' : '0',
            'bio' => $bio,
            'id' => get_session('user_id'),
        ]);

        set_flash('Félicitation, votre profil a bien été mis a jour!');
        redirect('profile.php?id='.get_session('user_id'));
    }else {
        save_input_data();
        $errors[] = "Veuillez remplir tous les champs marqués d'un (*)";
    }

}else {
    clear_input_data();
}

require('views/edit_user.view.php');

?>