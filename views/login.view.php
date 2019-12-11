<?php $title = 'Connexion'?>
<!-- <?php include('constants/constants.php')?> -->
<?php include('partials/_header.php')?>

<!-- Begin page content -->
<main id="main-content" >
  <div class="container">
    <h1 class="text-center">Connexion</h1>
    <?php include('partials/_error.php')?>
        <form data-parsley-validate method="post" class=" col-md-6 offset-md-3 card card-body bg-light" autocomplete="off">
            <div class="form-group">
                <label for="identifiant">Pseudo ou email</label>
                <input type="text" data-parsley-trigger="change" value="<?= get_input('identifiant') ?>" class="form-control" name="identifiant" id="identifiant" placeholder="Nom" required='required'>
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" data-parsley-trigger="change" class="form-control" name="password" id="password" placeholder="Mot de passe" required='required'>
            </div>
            
            <button type="submit" class="btn btn-primary" value="Connexion" name="login">Submit</button>
        </form>
  </div>
</main>

<?php 

include('partials/_footer.php')

?>

