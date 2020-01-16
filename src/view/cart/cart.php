<section class="container cart">
  <h1 class="cart__title">Winkelmand</h1>

  <?php if (empty($_SESSION['cart'])) { ?>
    <article class="cart__empty">
      <h2>Winkelmand is leeg</h2>
      <p>Oeps! Het ziet er naar uit dat je winkelmand leeg is.</p>
      <a class="button button--primary" href="index.php?page=webshop"><span>Bekijk webshop</span></a>
    </article>
  <?php } else { ?>
  <form action="index.php?page=cart" method="post" class="form form--cartoverview">

    <div class="cart__items">
      <?php
        $total = 0;
        foreach($_SESSION['cart'] as $item) {
        $itemTotal = number_format($item['item']['price'] * $item['quantity'], 2);
        $total += $itemTotal;
      ?>
      <section class="cart__item">
        <!-- MOET NOG ACHTER TITEL -->
        <img class="item__info item__info--img" src="assets/img/thumbnails/<?php echo $item['item']['thumbnail'];?>" alt="<?php echo $item['item']['title'];?>">
        <div class="item__info item__info--item">
          <h2 class="info__title"><?php echo $item['item']['title'] . ' | ' . $item['item']['name'];?></h2>
          <p><?php echo $item['item']['intro'];?></p>
        </div>
        <!--<div class="item__info item__info--price">
          <p>Prijs</p>
          <p>&euro; <?php echo $item['item']['price'];?></p>
        </div> -->
        <div class="item__info item__info--quantity">
          <p>Aantal</p>
          <label class="label label--quantity"><span class="hidden">Aantal</span>
          <button onclick="this.parentNode.querySelector('input[type=number]').stepDown(); return false;"></button>
          <input class="input input--number" name="quantity[<?php echo $item['item']['id'] . '-' . $item['option'];?>]" type="number" min="0" max="99" value="<?php echo $item['quantity'];?>" required>
          <button onclick="this.parentNode.querySelector('input[type=number]').stepUp(); return false;" class="plus"></button>
        </label>
        </div>
        <div class="item__info item__info--subtotal">
          <p>Subtotaal</p>
          <p>&euro; <?php echo $itemTotal;?></p>
        </div>
        <!-- MOET AANGEPAST WORDEN BIJ NIEUWE METHODE -->
        <button class="item__info item__info--remove" type="submit" name="remove" value="<?php echo $item['item']['id'] . '-' . $item['option'];?>"><span class="hidden">Verwijder</span></button>
      </section>


      <?php }?>
        </div>

    <button type="submit" name="action" value="update" class="update hidden-js"><span class="update__text">Bijwerken</span></button>

    <article class="cart__info">
      <h2 class="hidden">Promocode</h2>
      <p>Gratis verzending binnen<br> 3 à 4 werkdagen</p>
      <div>
        <label class="label label--text" for="promocode">Promocode
          <input class="input input--text" id="promocode" type="text">
        </label>
      </div>
    </article>

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
