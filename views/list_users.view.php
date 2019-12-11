<?php $title = 'Liste des utilisateurs'?>
<?php include('partials/_header.php')?>

<main id="main-content" >
  <div class="container">
    
    <h1> Liste des utilisateurs</h1>

    <?php foreach ($users as $user): ?>

        <div class="user-block">
            <a href="profile.php?id=<? $user->id ?>">
                <img src="<?= get_avatar_url($user->email, 70) ?>" alt="<?= e($user->pseudo)?>" class="rounded-circle">
            </a>
            <h4 class="user-block-username">
            <?= e($user->pseudo)?>
            </h4>
        </div>
    <?php endforeach ?>
  </div>
</main>

<?php include('partials/_footer.php') ?>