<div class="container--fluid">
  <article class="banner__wrapper">
    <!--<img src="assets/img/webshop/jpg/header_1024x310.jpg" alt="Fahrenheit 451">-->
    <span class="banner__label">Weekly special</span>
    <div class="banner">
      <h2 class="banner__title">Fahrenheit 451</h2>
      <p class="banner__info">Ontdek het verhaal van Fahrenheit 451, een dystopische wereld waar boeken verbrand worden.</p>
      <a class="button button--secondary button--inline" href="index.php?page=longread"><span>Ontdek</span></a>
    </div>
  </article>
</div>

<div class="container">
  <!-- FILTER -->
  <section>
    <h2 class="hidden">Filter webshop items</h2>
    <form action="index.php" class="form filter__form" method="get">
      <input type="hidden" name="page" value="webshop" />
      <div class="filter">
        <p class="filter__title">Categorieën</p>
        <div class="filter__inputs__wrapper">
        <?php foreach($categories as $category): ?>
          <label for="<?php echo $category['name'] ?>" class="filter__label">
          <input class="filter__input" type="checkbox" id="<?php echo $category['name'] ?>" name="categories[]" value="<?php echo $category['id'] ?>">
          <span class="checkbox__mark"></span>
          <?php echo $category['name'] ?>
          </label>
        <?php endforeach; ?>
        </div>
        <button type="submit" class="button button--filter hidden-js" value="filter">Filter</button>
        <a class="filter__delete" href="index.php?page=webshop">Filter wissen</a>
      </div>
    </form>
  </section>

  <!-- ITEMS -->
  <section>
    <h2 class="hidden">Webshop items</h2>
      <ul class="webshop__items">
      <?php foreach($items as $item): ?>
      <li class="webshop__item__wrapper">
        <a class="webshop__item" href="index.php?page=shopitem&id=<?php echo $item['id'] ?>">
          <h3 class="item__title"><?php echo $item['title'] ?></h3>
          <span class="item__price"><?php echo $item['priceinfo'] ?></span>
          <p class="item__info"><?php echo $item['intro'] ?></p>
          <picture class="item__img">
            <source type="image/webp" srcset="assets/img/thumbnails/webp/<?php echo $item['thumbnail'] ?>.webp">
            <img src="assets/img/thumbnails/jpg/<?php echo $item['thumbnail'] ?>.jpg"	alt="<?php echo $item['title'] ?>">
          </picture>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </section>
</div>
