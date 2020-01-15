<div class="container">
<a class="back back--webshop" href="index.php?page=webshop">Keer terug naar de webshop</a>
<article class="shopitem">
  <h2 class="hidden"><?php echo $item['title']; ?></h2>
  <section class="shopitem__images">
    <h2 class="hidden">Afbeeldingen</h2>
    <div class="images__wrapper">
      <?php foreach($images as $index => $image): ?>
        <input type="radio" name="slide_switch" id="<?php echo $index; ?>" <?php if ($index == 0) { echo 'checked'; }?> />
        <label for="<?php echo $index; ?>">
          <img class="image__small" src="assets/img/webshop/<?php echo $image['path']; ?>" />
        </label>
        <img src="assets/img/webshop/<?php echo $image['path']; ?>"/>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="shopitem__info">
      <h2 class="hidden">Infosectie</h2>
      <p class="info__title"><?php echo $item['title']; ?></p>
      <p class="info__price"><?php echo $item['priceinfo']; ?></p>
    <?php echo $item['description']; ?>

    <form action="index.php?page=cart" method="POST" class="form form--shopitem">
      <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">

      <?php if(!empty($item['optioninfo'])) { ?>
      <p><?php echo $item['optioninfo']; ?></p>
      <div class="shopitem__options">
        <?php foreach($options as $option): ?>
          <!-- NIEUW - WERKT NIET ? -->
          <!-- Unieke combinatie item+option, hiermee kijk je of item al in cart zit -->
          <input type="hidden" name="item_idtest" value="<?php echo $item['title'] . '-' . $option['id']; ?>">

          <input type="radio" name="option_name" value="<?php echo $option['name']; ?>" class="shopitem__input hidden" id="<?php echo $option['name']; ?>">
          <label class="shopitem__label" for="<?php echo $option['name']; ?>">
            <?php echo $option['name']; ?>
            <span class="price">&euro; <?php echo $option['price']; ?></span>
          </label>
        <?php endforeach; ?>

      </div>
      <?php } else { ?>
        <input type="hidden" name="option_name" value="no option">
      <?php }?>

      <p>Aantal</p>
      <div class="shopitem__cart">
      <label class="label label--quantity" for="quantity"><span class="hidden">Aantal</span>
        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown(); return false;"></button>
        <input class="input input--number" id="quantity" name="quantity" type="number" min="1" max="99" value="1" required>
        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp(); return false;" class="plus"></button>
      </label>
      <button class="button button--secondary button--addtocart" type="submit" name="action" value="add">Voeg toe aan winkelmand</button>
      </div>
    </form>

    <?php if (!empty($_SESSION['add'])): ?>
	    <p class="addedtocart"><?php echo $_SESSION['add']; ?></p>
    <?php endif; ?>

  </section>

</article>
</div>
