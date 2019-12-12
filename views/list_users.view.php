<?php $title = 'Liste des utilisateurs';?>
<?php include('partials/_header.php');?>
<style>
.title-list{
  margin-bottom: 3vh;
}
.container{
  margin-top: 8vh;
}
.users{
  margin-bottom: 3em;
}

.user-block{
  text-align: center;
}

.user-block .avatar{
  margin: auto;
}
    </style>
<main id="main-content" >
  <div class="container">
    
    <h1 class="title-list"> Liste des utilisateurs</h1>
      <?php foreach(array_chunk($users, 4) as $user_set): ?>
        <div class="row users">
          <?php foreach ($user_set as $user): ?>
            <div class="col-md-3 user-block">
              <a href="profile.php?id=<?= $user->id ?>">
                  <img src="<?= get_avatar_url($user->email, 70) ?>" alt="<?= e($user->pseudo)?>" class="avatar rounded-circle">
              </a>
              <h4 class="user-block-username">
              <?= e($user->pseudo)?>
              </h4>
            </div>
          <?php endforeach ?>
        </div>
      <?php endforeach ?>

      <div id="pagination"><?= $pagination ?></div>

  </div>
</main>

<?php include('partials/_footer.php') ?>