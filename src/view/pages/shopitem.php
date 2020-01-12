<div class="container">
<a class="back" href="index.php?page=webshop">Keer terug naar de webshop</a>
<article class="shopitem">
  <h1 class="hidden">Item</h1>

  <section class="shopitem__images">
    <h2 class="hidden">Item images</h2>
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
    <div class="info__wrapper">
      <h2 class="info__title"><?php echo $item['title']; ?></h2>
      <span class="info__price"><?php echo $item['priceinfo']; ?></span>
    </div>
    <?php echo $item['description']; ?>

    <form action="" class="form form--shopitem">
    <?php if(!empty($item['optioninfo'])): ?>
    <p><?php echo $item['optioninfo']; ?></p>
    <div class="shopitem__options">

      <?php foreach($options as $option): ?>
        <label class="shopitem__option"><input type="radio" name="option" value="<?php echo $option['id']; ?>"><span class="radio__mark"></span><?php echo $option['name']; ?></label>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <p>Aantal</p>
    <div class="shopitem__cart">
    <label class="label label--quantity"><span class="hidden">Aantal</span>
      <button onclick="this.parentNode.querySelector('input[type=number]').stepDown(); return false;"></button>
      <input class="input input--number" type="number" min="1" max="99" value="1" required>
      <button onclick="this.parentNode.querySelector('input[type=number]').stepUp(); return false;" class="plus"></button>
    </label>
    <button class="button button--secondary">Voeg toe aan winkelmand</button>
    </div>
    </form>

  </section>

</article>
</div>