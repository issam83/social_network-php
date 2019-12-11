<?php $title = 'Profil'?>
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
                                    <h5>Biographie de <?= e($user->name)?></h5>
                                    <p>
                                        <?= $user->bio ? nl2br(e($user->bio)) : "Aucune biographie pour le moment ..." ?>
                                    </p>
                            </div>
                    </div>
            </div>

            <?php
                if(!empty($_GET['id']) && $_GET['id'] === get_session('user_id')) : 
            ?>

            <div class="card col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                <h5 class="card-header">Completer mon profil</h5>
                    <div class="card-body">
                        <?php include('partials/_error.php')?>
                            <form data-parsley-validate method="post" class="card card-body bg-light" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Nom<span class="text-danger">*</span></label>
                                                <input type="text" value="<?= get_input('name') ? get_input('name') : e($user->name)?>" data-parsley-trigger="change" class="form-control" name="name" id="name" placeholder="Nom" required='required'>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="city">Ville<span class="text-danger">*</span></label>
                                                <input type="text" value="<?= get_input('city') ? get_input('city') : e($user->city)?>" data-parsley-trigger="change" class="form-control" name="city" id="city" placeholder="Nom" required='required'>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country">Pays<span class="text-danger">*</span></label>
                                                <input type="text" value="<?= get_input('country') ? get_input('country') : e($user->country)?>" data-parsley-trigger="change" class="form-control" name="country" id="country" placeholder="Nom" required='required'>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sex">Sexe<span class="text-danger">*</span></label>
                                                    <select class="form-control" name="sex" id="sex">
                                                        <option value="H" <?= $user->sex == "H" ? "selected" : ""?>>Homme</option>
                                                        <option value="F" <?= $user->sex == "F" ? "selected" : ""?>>Femme</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="twitter">Twitter</label>
                                                <input type="text" value="<?= get_input('twitter') ? get_input('twitter') : e($user->twitter)?>" data-parsley-trigger="change" class="form-control" name="twitter" id="twitter">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="github">Github</label>
                                                <input type="text" value="<?= get_input('github') ? get_input('github') : e($user->github)?>" data-parsley-trigger="change" class="form-control" name="github" id="github">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="available_for_hiring" id="available_for_hiring">
                                            <label class="form-check-label" for="available_for_hiring"
                                            <?= $user->available_for_hiring ? "checked" : ""?>>
                                                Disponible pour un emploi ?
                                            </label>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="bio">Bio<span class="text-danger">*</span></label>
                                                <textarea type="text" rows="5" cols="10" data-parsley-trigger="change" class="form-control" name="bio" id="bio" placeholder="Raconte ta vie" required='required'><?= get_input('github') ? get_input('github') : e($user->bio)?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                
                                <input type="submit" class="btn btn-primary col-md-5" value="Valider" name="update"/>
                            </form>
                    </div>
                        <div class="card-footer text-muted">
                            2 days ago
                        </div>
                    </div>
        </div>
                <?php  endif;?>
  </div>
</main>

<?php include('partials/_footer.php') ?>