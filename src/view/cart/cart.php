<section class="container cart">
  <h2 class="cart__title">Winkelmand</h2>

  <!-- EMPTY STATE -->
  <?php if (empty($_SESSION['cart'])) { ?>
    <article class="cart__empty">
      <h2>Winkelmand is leeg</h2>
      <p>Oeps! Het ziet er naar uit dat je winkelmand leeg is.</p>
      <a class="button button--primary" href="index.php?page=webshop"><span>Bekijk webshop</span></a>
    </article>

  <!-- FILLED -->
  <?php } else { ?>
    <form action="index.php?page=cart" method="post" class="form form--cartoverview"
    onkeydown="return event.key != 'Enter';"> <!-- Geen submit form bij ENTER -->

      <div class="cart__items">
        <?php
          $total = 0;
          foreach($_SESSION['cart'] as $item) {
          $itemTotal = number_format($item['price'] * $item['quantity'], 2);
          $total += $itemTotal;
        ?>
          <section class="cart__item">
            <!-- TITLE -->
            <div class="item__info">
              <h2 class="item__title"><?php echo $item['item']['title'];?></h2>
              <?php if ($item['item']['name'] != 'no option') { echo '<p class="info__option">' . $item['item']['name'] .'</p>';} ?>
            </div>

            <!-- IMG -->
            <img class="item__img" src="assets/img/thumbnails/jpg/<?php echo $item['item']['thumbnail'];?>.jpg" alt="<?php echo $item['item']['title'];?>">

            <!-- QUANTITY -->
            <div class="item__quantity quantity__wrapper">
              <button type="button" class="min button--quantity"></button>
              <label class="label label--quantity" for="<?php echo $item['item']['id'] . '-' . $item['option'];?>"><span class="hidden">Aantal</span>
                <input class="input input--number" name="quantity[<?php echo $item['item']['id'] . '-' . $item['option'];?>]" id="<?php echo $item['item']['id'] . '-' . $item['option'];?>" type="number" min="0" max="99" value="<?php echo $item['quantity'];?>" required>
              </label>
              <button type="button" class="plus button--quantity"></button>
            </div>

            <!-- SUBTOTAL -->
            <div class="item__subtotal">
              <input class="item-price" type="hidden" name="price" value="<?php echo $item['price'] ?>">
              <?php if($item['item']['price'] != $item['price']) {echo '<del class="oldprice">&euro; ' . $item['item']['price'] * $item['quantity'] . '</del>';}?>
              <p class="item-total">&euro; <?php echo $itemTotal;?></p>
            </div>
            <button class="item__remove" type="submit" name="remove" value="<?php echo $item['item']['id'] . '-' . $item['option'];?>"><span class="hidden">Verwijder</span></button>
          </section>
        <?php }?>
      </div>

      <!-- EDIT -->
      <button type="submit" name="action" value="update" class="update"><span class="update__text">Bijwerken</span></button>

      <!-- EXTRA -->
      <article class="cart__info">
        <h2 class="hidden">Promocode</h2>
        <p>Gratis verzending binnen 3 à 4 werkdagen</p>
        <div>
          <label class="label label--text" for="promocode">Promocode</label>
          <?php if (!empty($_SESSION['promo'])): ?>
	          <p class="addedpromo"><?php echo $_SESSION['promo']; ?></p>
          <?php endif; ?>
          <div class="promocode__wrapper">
            <input class="input input--text" name="promocode" id="promocode" type="text">
            <button type="submit" name="action" value="promo" class="hidden-js">
              <span class="hidden">Invoegen</span>
            </button>
          </div>
        </div>
      </article>

      <!-- BUTTONS -->
      <article class="cart__navigate">
        <h2 class="hidden">Verder met bestellen</h2>
        <a class="back" href="index.php?page=webshop">Keer terug naar de webshop</a>
        <div class="navigate__checkout">
          <p><span class="totalprice">&euro; <?php echo  number_format($total ,2) ;?></span></p>
          <a class="button button--primary" href="index.php?page=login"><span>Bestellen</span></a>
        </div>
      </article>

    </form>
   <?php }?>
</section>
