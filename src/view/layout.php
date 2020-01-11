<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Todos - <?php echo $title; ?></title>
    <?php /* NEW */ ?>
    <?php echo $css;?>
  </head>
  <body>

    <header>
      <div class="container">
        <nav class="menu menu--secondary">
          <ul class="menu__items">
            <li class="menu__item">Video</li>
            <li class="menu__item">TV-gids</li>
            <li class="menu__item">Zoekertjes</li>
            <li class="menu__item">Abonnement nemen</li>
          </ul>
          <ul class="menu__items">
            <li class="menu__item">Webshop</li>
            <li class="menu__item">Nu in Humo</li>
            <li class="menu__item">Login</li>
            <li class="menu__item">Registreer</li>
          </ul>
        </nav>
      </div>
      <nav class="menu menu--primary">
        <div class="container">
          <ul class="menu__items">
            <li class="menu__item">Home</li>
            <li class="menu__item">Actua</li>
            <li class="menu__item">Humor</li>
            <li class="menu__item">Logo</li>
            <li class="menu__item">TV/Film</li>
            <li class="menu__item">Muziek</li>
            <li class="menu__item">Boeken</li>
            <li class="menu__item">Winkelmand</li>
            <li class="menu__item">Zoek</li>
          </ul>
        </div>
      </nav>
    </header>
    <main>
      <?php
        if(!empty($_SESSION['error'])) {
          echo '<div class="error box">' . $_SESSION['error'] . '</div>';
        }
        if(!empty($_SESSION['info'])) {
          echo '<div class="info box">' . $_SESSION['info'] . '</div>';
        }
      ?>
      <?php echo $content;?>
    </main>
    <?php echo $js; ?>
  </body>
</html>
