<div class="container">
  <h1 class="hidden">Webshop</h1>
  <article class="banner__wrapper">
    <span class="banner__label">Weekly special</span>
    <div class="banner">
      <h2 class="banner__title">Fahrenheit 451</h2>
      <p class="banner__info">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
      <a class="button button--primary" href="#"><span>Ontdek</span></a>
    </div>
  </article>

  <article>
    <section class="form__wrapper">
      <h2 class="hidden">Filter webshop items</h2>
      <form action="index.php?page=webshop" method="get">
        <div class="filter">
          <p class="filter__title">Categorieën</p>
          <label for="abonnementen" class="filter__label">
            <input class="filter__input" type="checkbox" id="abonnementen" name="categories" value="abonnementen"> <!-- categories[] -->
            <span class="checkbox__mark"></span>
            Abonnementen
          </label>
          <label for="gadgets" class="filter__label">
            <input class="filter__input" type="checkbox" id="gadgets" name="categories" value="gadgets">
            <span class="checkbox__mark"></span>
            Gadgets
          </label>
          <label for="boeken" class="filter__label">
            <input class="filter__input" type="checkbox" id="boeken" name="categories" value="boeken">
            <span class="checkbox__mark"></span>
            Boeken
          </label>
          <input type="submit" class="button" value="filter">
          <p class="filter__delete">Filter wissen</p>
        </div>
      </form>
    </section>

    <section>
      <h2 class="hidden">Webshop items</h2>
        <ul class="webshop__items">
        <?php foreach($items as $item): ?>
        <li class="webshop__item__wrapper">
          <a class="webshop__item" href="index.php?page=shopitem&id=<?php echo $item['id'] ?>">
            <h3 class="item__title"><?php echo $item['title'] ?></h3>
            <span class="item__price"><?php echo $item['priceinfo'] ?></span>
            <p class="item__info"><?php echo $item['intro'] ?></p>
            <img class="item__img" src="assets/img/thumbnails/<?php echo $item['thumbnail'] ?>" alt="<?php echo $item['title'] ?>">
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </section>
  </article>
</div>
