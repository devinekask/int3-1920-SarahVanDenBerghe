
<!-- OVERVIEW -->
<div class="container order">
  <section class="order__overview">
    <h2 class="overview__title">Overzicht bestelling</h2>
    <?php
      $total = 0;
      foreach($_SESSION['cart'] as $item) {
      $itemTotal = $item['item']['price'] * $item['quantity'];
      $total += $itemTotal;
    ?>
    <section class="overview__item">
      <div class="item__title">
        <h3><?php echo $item['item']['title'];?> <?php if ($item['item']['name'] != 'no option') { echo '<span class="item__option">(' . $item['item']['name'] . ')</span>';} ?></h3>
        <p>&euro; <?php echo $item['price'];?></p>
      </div>
      <p class="item__quantity"><?php echo $item['quantity'];?></p>
    </section>
    <?php }?>
    <section class="overview__price">
      <h3 class="price__title">Totaalprijs: &euro; <?php echo number_format($total, 2);?></h3>
      <p>Gratis verzending</p>
    </section>
  </section>

  <!-- FORM -->
  <div class="order__wrapper">
    <form class="form order__form" method="post" action="index.php?page=checkout">
      <input type="hidden" name="action" value="checkoutOrder">
      <input type="hidden" name="page" value="confirmation">

      <!-- GEGEVENS -->
      <section class="order__information">
        <h2>Afleveradres</h2>
        <label class="label label--firstname" for="firstname"><span>Voornaam <span class="errors"><?php if(!empty($errorsOrder['firstname'])){ echo $errorsOrder['firstname'];} ?></span></span>
          <input class="input input--text <?php if(!empty($errorsOrder['firstname'])){ echo 'input--error';} ?>" type="text" name="firstname" id="firstname"
            value="<?php if(!empty($_POST['firstname'])){ echo $_POST['firstname']; } ?>" required>
        </label>
        <label class="label label--lastname" for="lastname"><span>Achternaam <span class="errors"><?php if(!empty($errorsOrder['lastname'])){ echo $errorsOrder['lastname'];} ?></span></span>
          <input class="input input--text <?php if(!empty($errorsOrder['lastname'])){ echo 'input--error';} ?>" type="text" name="lastname" id="lastname"
          value="<?php if(!empty($_POST['lastname'])){ echo $_POST['lastname']; } ?>" required>
        </label>
        <label class="label label--email" for="email"><span>E-mail <span class="errors"><?php if(!empty($errorsOrder['email'])){ echo $errorsOrder['email'];} ?></span></span>
          <input class="input input--text <?php if(!empty($errorsOrder['email'])){ echo 'input--error';} ?>" type="email" name="email" id="email"
          value="<?php if(!empty($_POST['email'])){ echo $_POST['email']; } ?>" required>
        </label>
        <label class="label label--street" for="street"><span>Straat  <span class="errors"><?php if(!empty($errorsOrder['street'])){ echo $errorsOrder['street'];} ?></span></span>
          <input class="input input--text <?php if(!empty($errorsOrder['street'])){ echo 'input--error';} ?>" type="text" name="street" id="street"
          value="<?php if(!empty($_POST['street'])){ echo $_POST['street']; } ?>" required>
        </label>
        <label class="label label--housenumber" for="number"><span>Huisnummer <span class="errors"><?php if(!empty($errorsOrder['number'])){ echo $errorsOrder['number'];} ?></span></span>
          <input class="input input--text <?php if(!empty($errorsOrder['number'])){ echo 'input--error';} ?>" type="number" name="number" id="number"
          value="<?php if(!empty($_POST['number'])){ echo $_POST['number']; } ?>" required>
        </label>
        <label class="label label--postalcode" for="postalcode"><span>Postcode <span class="errors"><?php if(!empty($errorsOrder['postalcode'])){ echo $errorsOrder['postalcode'];} ?></span></span>
          <input class="input input--text <?php if(!empty($errorsOrder['postalcode'])){ echo 'input--error';} ?>" type="number" name="postalcode" id="postalcode"
          value="<?php if(!empty($_POST['postalcode'])){ echo $_POST['postalcode']; } ?>" required>
        </label>
        <label class="label label--city" for="city"><span>Woonplaats <span class="errors"><?php if(!empty($errorsOrder['city'])){ echo $errorsOrder['city'];} ?></span></span>
          <input class="input input--text <?php if(!empty($errorsOrder['city'])){ echo 'input--error';} ?>" type="text" name="city" id="city"
          value="<?php if(!empty($_POST['city'])){ echo $_POST['city']; } ?>" required>
        </label>
      </section>

      <!-- BETALINGSWIJZE -->
      <section class="order__payment">
        <h2>Betalingswijze</h2>
        <div class="payment__wrapper">
            <input class="hidden input input--payment" type="radio" id="paypal" name="payment" value="paypal" checked
              <?php if(!empty($_POST['payment']) && $_POST['payment'] == 'junior'){ echo 'checked'; } ?> >
            <label class="label label--payment label--paypal" for="paypal">
              <span class="hidden">Paypal</span>
            </label>

            <input class="hidden input input--payment" type="radio" id="visa" name="payment" value="visa"
            <?php if(!empty($_POST['payment']) && $_POST['payment'] == 'visa'){ echo 'checked'; } ?> >
              <label class="label label--payment label--visa" for="visa">
              <span class="hidden">Visa</span>
            </label>

            <input class="hidden input input--payment" type="radio" id="maestro" name="payment" value="maestro"
            <?php if(!empty($_POST['payment']) && $_POST['payment'] == 'maestro'){ echo 'checked'; } ?> >
            <label class="label label--payment label--maestro" for="maestro">
              <span class="hidden">Maestro</span>
            </label>

            <input class="hidden input input--payment" type="radio" id="bancontact" name="payment" value="bancontact"
            <?php if(!empty($_POST['payment']) && $_POST['payment'] == 'bancontact'){ echo 'checked'; } ?> >
            <label class="label label--payment label--bancontact" for="bancontact">
              <span class="hidden">Bancontact</span>
            </label>
        </div>
      </section>

      <!-- SUBMIT -->
      <div class="button__wrapper">
        <p class="errors errors--summary"><?php if(!empty($errorsOrder)): ?>Gelieve alle velden in te vullen.<?php endif; ?></p>
        <input class="button button--secondary" type="submit" value="Betalen">
      </div>
    </form>
  </div>
</div>

