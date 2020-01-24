<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/img/favicon.jpg"/>
    <link rel="stylesheet" href="https://use.typekit.net/giv5uan.css">
    <title><?php echo $title; ?></title>
    <?php echo $css;?>
  </head>
  <body <?php if($title === 'Fahrenheit 451') { echo 'class="longread"';} ?>>
    <?php if($title != 'Fahrenheit 451') { ?>
    <h1 class="hidden"><?php echo $title ?></h1>
    <header>
      <!-- DESKTOP MENU -->
      <div class="menu__wrapper menu__wrapper--desktop">
      <nav class="menu menu--primary">
        <h2 class="hidden">Hoofdnavigatie</h2>
          <ul class="menu__items container--fixed">
            <li class="menu__item">Home</li>
            <li class="menu__item">Actua</li>
            <li class="menu__item">Humor</li>
            <li class="menu__item menu__item--logo">
              <span class="hidden">Humo</span>
              <div class="identity__logo mainsite_logo"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 210 70"><path fill="#EE090C" d="M-.5 0h211v69.5H-.5z"></path><path fill="#FFF" d="M51.6 13.6H38.5v16H28.4v-16H15.2v43.2h13.1V40h10.1v16.8h13.1V13.6zm42.1 0H83.4v26.5c0 2 .2 4.3-1.5 5.8-1.1 1-3 1.4-4.5 1.4-1.7 0-3.7-.6-4.7-1.9-.8-1.3-.8-3.3-.8-4.7v-27H58.5v28.5c0 5.2.8 9.2 5.4 12.3 3.3 2.2 8.4 3.1 12.4 3.1 4.5 0 9-.7 12.7-3.7 4.1-3.4 4.7-7.4 4.7-12.4V13.6zm54.6 0H131l-5.9 22.9h-.1l-6.1-22.9h-17.2v43.2h9.9V26h.1l8.1 30.9h8.3L136 26h.1v30.9h12.3l-.1-43.3zm27-.6c-13.1 0-20.5 9.5-20.5 22.4 0 12.3 7.5 22.1 20.5 22.1s20.5-9.8 20.5-22.1c0-12.9-7.5-22.4-20.5-22.4zm0 9.8c5.8 0 6.4 8.4 6.4 12.7 0 4.2-.5 12.2-6.4 12.2-6 0-6.4-8-6.4-12.2-.1-4.3.5-12.7 6.4-12.7z"></path></svg></div>
            </li>
            <li class="menu__item">TV/Film</li>
            <li class="menu__item">Muziek</li>
            <li class="menu__item">Boeken</li>
            <li class="menu__icons">
              <div class="menu__item menu__item--icon menu__item--search"><span class="hidden">Zoek</span></div>
              <a href="index.php?page=cart" class="icon__wrapper"><div class="menu__item menu__item--icon menu__item--cart <?php if(!empty ($_SESSION['cart'])) { echo 'cart--filled';} ?>"><span class="hidden">Winkelmand</span></div></a>
           </li>
          </ul>
      </nav>
      <nav class="menu menu--secondary container--fixed">
        <h2 class="hidden">Subnavigatie</h2>
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

      <!-- MOBILE MENU -->
      <div class="menu__wrapper menu__wrapper--mobile">
        <ul class="menu__items menu__items--mobile">
          <li class="menu__item menu__item--left menu__item--icon menu__item--hamburger"><span class="hidden">Menu</span></li>
          <li class="menu__item menu__item--left menu__item--icon menu__item--search"><span class="hidden">Zoek</span></li>
          <li class="menu__item menu__item--logo"><a href="index.php?page=webshop"><span class="hidden">Humo</span></a></li>
          <li class="menu__items--right">
            <a href="index.php?page=cart" class="icon__wrapper"><div class="menu__item menu__item--icon menu__item--cart <?php if(!empty ($_SESSION['cart'])) { echo 'cart--filled';} ?>"><span class="hidden">Winkelmand</span></div></a>
            <div class="menu__item menu__item--icon menu__item--user"><span class="hidden">Account</span></div>
          </li>
        </ul>
      </div>
    </header>
    <?php } ?>
    <?php if($title != 'Fahrenheit 451') { ?>
    <main>
      <?php if($title === 'Login' || $title === 'Gegevens' || $title === 'Bevestiging'): ?>
      <section class="steps__wrapper container">
        <h2 class="hidden">Progress</h2>
        <div class="steps">
          <div class="step__item">
            <p class="step__title">Inloggen</p>
            <p class="step__number <?php if($title === 'Login') echo 'step__number--active' ?>">1</p>
          </div>
          <div class="step__item">
            <p class="step__title">Gegevens</p>
            <p class="step__number <?php if($title === 'Gegevens') echo 'step__number--active' ?>">2</p>
          </div>
          <div class="step__item">
            <p class="step__title">Betalen</p>
            <p class="step__number">3</p>
          </div>
          <div class="step__item">
            <p class="step__title">Afronden</p>
            <p class="step__number <?php if($title === 'Bevestiging') echo 'step__number--active' ?>">4</p>
          </div>
        </div>
      </section>
      <?php endif; ?>
      <?php } else { ?>
        <h1 class="hidden">Boek van de week</h1>
        <nav class="menu--longread">
          <h2 class="hidden">Navigatie</h2>
          <ul>
            <li><a href="#boek">Over het boek</a></li>
            <li><a href="#auteur">Auteur</a></li>
            <li><a href="#backstory">Backstory</a></li>
            <li><a href="#problematiek">Problematiek</a></li>
            <li><a href="#meer">Meer boeken</a></li>
          </ul>
        </nav>
      <?php } ?>
      <?php if($title === 'Fahrenheit 451') { echo '<main>';} ?>
      <?php echo $content;?>
    </main>

    <?php if($title != 'Fahrenheit 451') { ?>
    <footer class="footer">
      <div class="footer--desktop">
      <nav class="footer__nav container">
        <h2 class="hidden">Footer navigatie</h2>
        <ul class="footer__columns">
          <li class="footer__column">
            <span class="column__title">Actua</span>
            <ul class="column__list">
              <li class="list__item"><a href="#">Nu in Humo</a></li>
              <li class="list__item"><a href="#">De Columns</a></li>
              <li class="list__item"><a href="#">Dossiers</a></li>
              <li class="list__item"><a href="#">Politiek</a></li>
              <li class="list__item"><a href="#">Sport</a></li>
              <li class="list__item"><a href="#">Onze Man/Vrouw</a></li>
              <li class="list__item"><a href="#">Eerder in Humo</a></li>
              <li class="list__item"><a href="#">De eindejaarsvragen</a></li>
            </ul>
          </li>

          <li class="footer__column">
            <span class="column__title">Humor</span>
            <ul class="column__list">
              <li class="list__item"><a href="#">Fotospecials</a></li>
              <li class="list__item"><a href="#">Cartoons</a></li>
              <li class="list__item"><a href="#">Uitlaat</a></li>
              <li class="list__item"><a href="#">(Bulderlacht)</a></li>
              <li class="list__item"><a href="#">Doe het zelf</a></li>
              <li class="list__item"><a href="#">Humo's Comedy Cup</a></li>
            </ul>
          </li>

          <li class="footer__column">
            <span class="column__title">Tv/Film</span>
            <ul class="column__list">
              <li class="list__item"><a href="#">TV-gids</a></li>
              <li class="list__item"><a href="#">TV-tips</a></li>
              <li class="list__item"><a href="#">TV-reviews</a></li>
              <li class="list__item"><a href="#">Filmreviews</a></li>
              <li class="list__item"><a href="#">De 100% beste films volgens (es)</a></li>
            </ul>
          </li>

          <li class="footer__column">
            <span class="column__title">Muziek</span>
            <ul class="column__list">
              <li class="list__item"><a href="#">Concertreviews</a></li>
              <li class="list__item"><a href="#">CD-reviews</a></li>
              <li class="list__item"><a href="#">Humo's Rock Rally</a></li>
              <li class="list__item"><a href="#">Festivalitis</a></li>
            </ul>
          </li>

          <li class="footer__column">
            <span class="column__title">Boeken</span>
            <ul class="column__list">
              <li class="list__item"><a href="#">Reviews</a></li>
              <li class="list__item"><a href="#">Fictie</a></li>
              <li class="list__item"><a href="#">Non-fictie</a></li>
              <li class="list__item"><a href="#">Het lezen zoals het is</a></li>
              <li class="list__item"><a href="#">De grootste schrijvers van deze tijd</a></li>
            </ul>

            <span class="column__title">Ga naar</span>
            <ul class="column__list">
              <li class="list__item"><a href="#">Video</a></li>
              <li class="list__item"><a href="#">Foto's</a></li>
              <li class="list__item"><a href="#">Wedstrijden</a></li>
              <li class="list__item"><a href="#">Zoekertjes</a></li>
              <li class="list__item"><a href="#">Apps</a></li>
            </ul>
          </li>
        </ul>
      </nav>
      <section class="footer__info">
        <div class="container">
          <h2 class="hidden">Footer</h2>
          <ul class="info__items">
            <li class="info__item">Privacybeleid</li>
            <li class="info__item">Wedstrijdreglement</li>
            <li class="info__item">Adverteren</li>
            <li class="info__item">Gebruiksvoorwaarden</li>
            <li class="info__item">Cookiebeleid</li>
            <li class="info__item">Cookie instellingen</li>
            <li class="info__item">Contact</li>
            <li class="info__item">Colofon</li>
          </ul>
          <ul class="info__copyright">
            <li class="info__item">DPG</li>
            <li class="info__item">&copy; 2020 DPG Media</li>
            <li class="info__item">Naar de mobiele site</li>
          </ul>
      </div>
      </section>
      </div>
      <div class="footer--mobile">
          <a class="button button--secondary">Neem een Abonnement</a>
          <ul>
            <li>Colofon</li>
            <li>Contact</li>
            <li>Cookie instellingen</li>
          </ul>
      </div>
    </footer>
    <?php } ?>

    <?php echo $js; ?>

  </body>
</html>
