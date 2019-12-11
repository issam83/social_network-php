<?php $title = 'Accueil'?>
<?php include('constants/constants.php')?>
<?php include('partials/_header.php')?>

<!-- Begin page content -->
<main id="main-content" >
  <div class="container">
    <div class="jumbotron">
        <h1 class="mt-5"><?php echo WEBSITE_NAME ?></h1>
        <?= $long_text['accueil_intro'][$_SESSION['locale']]?>
    </div>
  </div>
</main>

<?php 

include('partials/_footer.php')

?>

