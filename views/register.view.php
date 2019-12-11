<?php $title = 'Inscription'?>
<!-- <?php include('constants/constants.php')?> -->
<?php include('partials/_header.php')?>

<!-- Begin page content -->
<main id="main-content" >
  <div class="container">
    <h1 class="text-center">Devenez dès maintenant un nouveau membre !</h1>
    <?php include('partials/_error.php')?>
        <form data-parsley-validate method="post" class=" col-md-6 offset-md-3 card card-body bg-light" autocomplete="off">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" data-parsley-trigger="change" value="<?= get_input('name') ?>" class="form-control" name="name" id="name" placeholder="Nom" required='required'>
            </div>
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" data-parsley-minlength="3" data-parsley-trigger="change" value="<?= get_input('pseudo') ?>" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo" required='required'>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" data-parsley-trigger="change" value="<?= get_input('email') ?>" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Entrer email" required='required'>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" data-parsley-trigger="change" class="form-control" name="password" id="password" placeholder="Mot de passe" required='required'>
            </div>
            <div class="form-group">
                <label for="password_confirm">Confirme ton mot de passe</label>
                <input type="password" data-parsley-trigger="change" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confirme ton mot de passe" required='required' data-parsley-equalto='#password'>
            </div>
            <button type="submit" class="btn btn-primary" value="inscription" name="register">Submit</button>
        </form>
  </div>
</main>

<?php 

include('partials/_footer.php')

?>

