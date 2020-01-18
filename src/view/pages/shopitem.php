<div class="container">
  <a class="back back--webshop" href="index.php?page=webshop">Keer terug naar de webshop</a>

  <article class="shopitem">
    <h2 class="shopitem__title hidden"><?php echo $item['title']; ?></h2>

    <!-- IMAGES -->
    <section class="shopitem__images">
      <h2 class="hidden">Afbeeldingen</h2>
      <div class="image__small__wrapper">
        <?php foreach($images as $index => $image): ?>
          <a href="index.php?page=shopitem&<?php echo 'id=' . $_GET['id'] . '&image=' . $image['id']?>">
            <img class="image__small <?php if(!empty($_GET['image']) && $_GET['image'] == $image['id']) {
              echo 'image__small--active' ;
              } elseif (empty($_GET['image']) && $index == 0) {
                echo 'image__small--active' ;}?>"
            src="assets/img/webshop/<?php echo $image['path']; ?>"/>
          </a>
        <?php endforeach; ?>
      </div>
      <img class="images__big" src="assets/img/webshop/<?php echo $selectedImage['path']; ?>"/>
    </section>

    <!-- INFO -->
    <section class="shopitem__info">
      <h2 class="hidden">Infosectie</h2>
      <p class="info__title"><?php echo $item['title']; ?></p>
      <p class="info__price"><?php echo $item['priceinfo']; ?></p>
      <p class="info__description"><?php echo $item['description']; ?></p>

      <form action="index.php?page=cart" method="POST" class="form form--shopitem">
        <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">

        <!-- OPTIONS -->
        <?php if(!empty($item['optioninfo'])) { ?>
          <p><?php echo $item['optioninfo']; ?></p>
          <div class="info__options">
            <?php foreach($options as $index => $option): ?>

            <input type="radio" name="option_id" value="<?php echo $option['id']; ?>" class="option__input hidden" id="<?php echo $option['id']; ?>"
              <?php if ($index === 0) { echo 'checked';} ?>>
             <div>
                <label class="option__label" for="<?php echo $option['id']; ?>">
                  <?php echo $option['name']; ?><br>
                  <span class="price">&euro;<?php echo $option['price']; ?></span>
                </label>
              </div>
            <?php endforeach; ?>

          </div>
          <?php } else { ?>
            <input type="hidden" name="option_id" value="<?php echo $options[0]['id']; ?>">
          <?php }?>

          <!-- CART -->
          <p>Aantal</p>
          <div class="info__cart">
          <label class="label label--quantity" for="quantity"><span class="hidden">Aantal</span>
            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown(); return false;"></button>
            <input class="input input--number" id="quantity" name="quantity" type="number" min="1" max="99" value="1" required>
            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp(); return false;" class="plus"></button>
          </label>
          <button class="button button--secondary button--addtocart <?php if (!empty($_SESSION['add'])) { echo 'addedtocart';}?>" type="submit" name="action" value="add">
            <?php if (!empty($_SESSION['add'])) { ?>
                <span><?php echo $_SESSION['add']; ?></span>
            <?php } else { ?>
                Voeg toe aan winkelmand
            <?php } ?>
          </button>
        </div>
      </form>
    </section>
  </article>
</div>
