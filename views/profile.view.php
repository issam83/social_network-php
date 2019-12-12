<?php $title = 'Page de profil'?>
<!-- <?php include('constants/constants.php')?> -->
<?php include('partials/_header.php')?>

<!-- Begin page content -->
<main id="main-content" >
  <div class="container">
    <div class="row justify-content-around">

            <div class="card col-sm-5 col-md-6">
                <h5 class="card-header">Profil de <?= e($user->pseudo) ?></h5>
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="<?= get_avatar_url($user->email, 100) ?>" alt="Image de profil de <?= e($user->pseudo)?>" class="rounded-circle">
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <strong><?= e($user->pseudo) ?></strong><br />
                                        <a href="mailto:<?= e($user->email) ?>"><?= e($user->email) ?></a><br />
                                        <?= 
                                            $user->city && $user->country ? '<i class="fas fa-map-marker-alt"></i>&nbsp'.e($user->city). ' - ' .e($user->country).'<br />' : '';
                                        ?>
                                        <a href="https://www.google.com/maps?q=<?= e($user->city).' '.e($user->country) ?>" target="_blank">Voir sur google maps</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <?= 
                                            $user->twitter ? '<i class="fab fa-twitter"></i> <a href="//twitter.com/'.e($user->twitter).'">@'.e($user->twitter).'</a><br />' : '';
                                        ?>
                                        <?= 
                                            $user->github ? '<i class="fab fa-github"></i> <a href="//github.com/'.e($user->github).'">'.e($user->github).'</a><br />' : '';
                                        ?>
                                        <?= 
                                            $user->sex == 'H' ? '<i class="fas fa-male"></i>' : '<i class="fas fa-female"></i>';
                                        ?>
                                        <?= 
                                            $user->available_for_hiring ? 'Disponible pour un emploi' : 'Déjà en poste';
                                        ?>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <h5>Biographie de <?= e($user->pseudo)?></h5>
                                    <p>
                                        <?= $user->bio ? nl2br(e($user->bio)) : "Aucune biographie pour le moment ..." ?>
                                    </p>
                            </div>
                    </div>
            </div>

            
  </div>
</main>

<?php include('partials/_footer.php') ?>