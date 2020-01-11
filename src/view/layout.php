<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
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
            <li class="menu__item">Nu in Humo</li>
            <li class="menu__item">Login</li>
            <li class="menu__item">Registreer</li>
            <li class="menu__item menu__item--webshop"><a href="index.php?page=webshop">Webshop</a></li>
          </ul>
        </nav>
      </div>

      <nav class="menu menu--primary">
          <ul class="menu__items container">
            <li class="menu__item">Home</li>
            <li class="menu__item">Actua</li>
            <li class="menu__item">Humor</li>
            <li class="menu__item menu__item--logo">
              <div class="identity__logo mainsite_logo"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 210 70"><path fill="#EE090C" d="M-.5 0h211v69.5H-.5z"></path><path fill="#FFF" d="M51.6 13.6H38.5v16H28.4v-16H15.2v43.2h13.1V40h10.1v16.8h13.1V13.6zm42.1 0H83.4v26.5c0 2 .2 4.3-1.5 5.8-1.1 1-3 1.4-4.5 1.4-1.7 0-3.7-.6-4.7-1.9-.8-1.3-.8-3.3-.8-4.7v-27H58.5v28.5c0 5.2.8 9.2 5.4 12.3 3.3 2.2 8.4 3.1 12.4 3.1 4.5 0 9-.7 12.7-3.7 4.1-3.4 4.7-7.4 4.7-12.4V13.6zm54.6 0H131l-5.9 22.9h-.1l-6.1-22.9h-17.2v43.2h9.9V26h.1l8.1 30.9h8.3L136 26h.1v30.9h12.3l-.1-43.3zm27-.6c-13.1 0-20.5 9.5-20.5 22.4 0 12.3 7.5 22.1 20.5 22.1s20.5-9.8 20.5-22.1c0-12.9-7.5-22.4-20.5-22.4zm0 9.8c5.8 0 6.4 8.4 6.4 12.7 0 4.2-.5 12.2-6.4 12.2-6 0-6.4-8-6.4-12.2-.1-4.3.5-12.7 6.4-12.7z"></path></svg></div>
            </li>
            <li class="menu__item">TV/Film</li>
            <li class="menu__item">Muziek</li>
            <li class="menu__item">Boeken</li>
            <div class="menu__icons">
              <li class="menu__item menu__item--icon menu__item--search"><span class="hidden">Zoek</span></li>
              <li class="menu__item menu__item--icon menu__item--cart"><span class="hidden">Winkelmand</span></li>
            </div>
          </ul>
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
