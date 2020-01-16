<div class="container--fluid">
  <article class="banner__wrapper">
    <span class="banner__label">Weekly special</span>
    <div class="banner">
      <h2 class="banner__title">Fahrenheit 451</h2>
      <p class="banner__info">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
      <a class="button button--primary button--inline" href="#"><span>Ontdek</span></a>
    </div>
  </article>
</div>

  <div class="container">
    <section class="form__wrapper">
      <h2 class="hidden">Filter webshop items</h2>
      <form action="index.php?page=webshop" method="get">
        <input type="hidden" name="page" value="webshop" />
        <div class="filter">
          <p class="filter__title">Categorieën</p> <!-- nog foreach doen! -->
          <div class="filter__inputs__wrapper">
          <label for="abonnementen" class="filter__label">
            <input class="filter__input" type="checkbox" id="abonnementen" name="categories[]" value="1">
            <span class="checkbox__mark"></span>
            Abonnementen
          </label>
          <label for="gadgets" class="filter__label">
            <input class="filter__input" type="checkbox" id="gadgets" name="categories[]" value="2">
            <span class="checkbox__mark"></span>
            Gadgets
          </label>
          <label for="boeken" class="filter__label">
            <input class="filter__input" type="checkbox" id="boeken" name="categories[]" value="3">
            <span class="checkbox__mark"></span>
            Boeken
          </label>
          </div>
          <button type="submit" class="button button--filter" value="filter">Filter</button>
          <a class="filter__delete" href="index.php?page=webshop">Filter wissen</a>
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
</div>
