<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.php"><?php echo WEBSITE_NAME ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <img src="<?= get_avatar_url(get_session('email'))?>" alt="Image de profil de <? get_session('pseudo')?>" >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
     <ul class="nav navbarnav">
      <li><a href="list_users.php">Liste des utilisateur</a></li>
     </ul>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?= set_active('index') ?>">
          <a class="nav-link" href="index.php"><?= $menu['accueil'][$_SESSION['locale']]?> <span class="sr-only">(current)</span></a>
        </li>
        <?php if(is_logged_in()): ?>
          <li class="nav-item <?= set_active('profile') ?>">
            <a class="nav-link" href="profile.php?id=<?= get_session('user_id')?>"><?= $menu['mon_profil'][$_SESSION['locale']]?></a>
          </li>
          <li class="nav-item <?= set_active('edit_user') ?>">
              <a class="nav-link" href="edit_user.php?id=<?= get_session('user_id')?>"><?= $menu['editer_profil'][$_SESSION['locale']]?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php?id=<?= get_session('user_id')?>"><?= $menu['deconnexion'][$_SESSION['locale']]?></a>
          </li>
        <?php else: ?>
          <li class="nav-item <?= set_active('login') ?>">
            <a class="nav-link" href="login.php"><?= $menu['connexion'][$_SESSION['locale']]?></a>
          </li>
          <li class="nav-item <?= set_active('register') ?>">
            <a class="nav-link" href="register.php"><?= $menu['inscription'][$_SESSION['locale']]?></a>
          </li>
        <?php endif; ?>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
        <img src="<?= get_avatar_url(get_session('email'))?>" alt="Image de profil de <? get_session('pseudo')?>" >
      </form>
    </div>
  </nav>
</header>