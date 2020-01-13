<section class="container cart">
  <form action="" class="form form--cartoverview">
    <h1 class="cart__title">Winkelmand</h1>

    <?php foreach($_SESSION['cart'] as $item): ?>
      test
    <?php endforeach; ?>

    <article class="cart__items">
      <section class="cart__item">
        <img class="item__info item__info--img" src="assets/img/thumbnails/agenda.jpg" alt="">
        <div class="item__info item__info--item">
          <h2 class="info__title">Agenda & option</h2>
          <p>Description</p>
        </div>
        <div class="item__info item__info--price">
          <p>Prijs</p>
          <p>€ 1,99</p>
        </div>
        <div class="item__info item__info--quantity">
          <p>Aantal</p>
          <label class="label label--quantity"><span class="hidden">Aantal</span>
          <button onclick="this.parentNode.querySelector('input[type=number]').stepDown(); return false;"></button>
          <input class="input input--number" type="number" min="1" max="99" value="1" required>
          <button onclick="this.parentNode.querySelector('input[type=number]').stepUp(); return false;" class="plus"></button>
        </label>
        </div>
        <div class="item__info item__info--subtotal">
          <p>Subtotaal</p>
          <p>€ 4</p>
        </div>
        <button class="item__info item__info--remove"><span class="hidden">Verwijder</span></button>
      </section>


    <section class="cart__item">
      <img class="item__info item__info--img" src="assets/img/thumbnails/agenda.jpg" alt="">
      <div class="item__info item__info--item">
        <h2 class="info__title">Agenda & option</h2>
        <p>Description</p>
      </div>
      <div class="item__info item__info--price">
        <p>Prijs</p>
        <p>€ 1,99</p>
      </div>
      <div class="item__info item__info--quantity">
        <p>Aantal</p>
        <label class="label label--quantity"><span class="hidden">Aantal</span>
        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown(); return false;"></button>
        <input class="input input--number" type="number" min="1" max="99" value="1" required>
        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp(); return false;" class="plus"></button>
      </label>
      </div>
      <div class="item__info item__info--subtotal">
        <p>Subtotaal</p>
        <p>€ 4</p>
      </div>
      <button class="item__info item__info--remove"><span class="hidden">Verwijder</span></button>
    </section>

    </article>


    <article class="cart__info">
      <h2 class="hidden">Promocode</h2>
      <p>Gratis verzending binnen<br> 3 à 4 werkdagen</p>
      <label class="label label--text" for="promocode">Promocode
        <input class="input input--text" id="promocode" type="text">
      </label>
    </article>

    <article class="cart__navigate">
      <h2 class="hidden">Verder met bestellen</h2>
      <a class="back" href="index.php?page=webshop">Keer terug naar de webshop</a>
      <div class="navigate__checkout">
        <p><span class="totalprice">€ 54,39</span></p>
        <a class="button button--primary" href="index.php?page=login"><span>Bestellen</span></a>
      </div>
    </article>

  </form>
</section>
