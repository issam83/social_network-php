<?php 

session_start();
require('config/database.php');
require('constants/functions.php');
require('i18n/local.php');
require('constants/constants.php');


$req = $db->query('SELECT id FROM users');

	$nbre_total_users = $req->rowCount();

	$nbre_users_par_page = 20;

	$nbre_pages_max_gauche_et_droite = 4;

	$last_page = ceil($nbre_total_users / $nbre_users_par_page);

	if(isset($_GET['page']) && is_numeric($_GET['page'])){
		$page_num = $_GET['page'];
	} else {
		$page_num = 1;
	}

	if($page_num < 1){
		$page_num = 1;
	} else if($page_num > $last_page) {
		$page_num = $last_page;
	}

	$limit = 'LIMIT '.($page_num - 1) * $nbre_users_par_page. ',' . $nbre_users_par_page;

	//Cette requête sera utilisée plus tard
    $q = $db->query("SELECT id, pseudo, email FROM users ORDER BY pseudo $limit");
    $users = $q->fetchAll(PDO::FETCH_OBJ);

	$pagination = '';

	if($last_page != 1){
		if($page_num > 1){
			$previous = $page_num - 1;
			$pagination .= '<a href="list_users.php?page='.$previous.'">Précédent</a> &nbsp; &nbsp;';

			for($i = $page_num - $nbre_pages_max_gauche_et_droite; $i < $page_num; $i++){
				if($i > 0){
					$pagination .= '<a href="list_users.php?page='.$i.'">'.$i.'</a> &nbsp;';
				}
			}
		}

		$pagination .= '<span class="active">'.$page_num.'</span>&nbsp;';

		for($i = $page_num+1; $i <= $last_page; $i++){
			$pagination .= '<a href="list_users.php?page='.$i.'">'.$i.'</a> ';
			
			if($i >= $page_num + $nbre_pages_max_gauche_et_droite){
				break;
			}
		}

		if($page_num != $last_page){
			$next = $page_num + 1;
			$pagination .= '<a href="list_users.php?page='.$next.'">Suivant</a> ';
		}
	}

require('views/list_users.view.php');

?>