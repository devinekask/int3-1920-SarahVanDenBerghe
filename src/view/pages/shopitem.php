<div class="container">
<a class="back" href="index.php?page=webshop">Keer terug naar de webshop</a>
<article class="shopitem">
  <h1 class="hidden">Item</h1>

  <section class="shopitem__images">
    <h2 class="hidden">Item images</h2>
    <div class="image__small__wrapper images__wrapper">
      <input type="radio" name="slide_switch" id="id1" checked />
	    <label for="id1">
		    <img src="https://placeimg.com/87/130/any" width="87"/>
	    </label>
      <img src="https://placeimg.com/87/130/any"/>

      <input type="radio" name="slide_switch" id="id2" />
	    <label for="id2">
		    <img src="https://placeimg.com/87/131/any" width="87"/>
	    </label>
      <img src="https://placeimg.com/87/131/any"/>
    </div>
  </section>

  <section class="shopitem__info">
    <div class="info__wrapper">
      <h2 class="info__title">Retro leeslicht</h2>
      <span class="info__price">€ 18,50</span>
    </div>
    <p class="info__description">
      Een boekenlichtje met een vormgeving van vroeger en een gebruiksgemak van nu.  Dit leeslampje kan perfect bevestigd worden op elk boek. De richtbare led lamp zorgt voor optimaal leescomfort.
    </p>
    <p>Als je The Booklamp niet gebruikt, laat je’m eenvoudigweg achter in de verzwaarde voet. Je leukt er ook nog eens je bureau, tafel of schoorsteenmantel mee op. Wordt geleverd inclusief batterijen.</p>

    <form action="" class="form form--shopitem">
    <p>Kies je kleur</p>
    <div class="shopitem__options">
      <label class="shopitem__option"><input type="radio" name="x" value="1"><span class="radio__mark"></span>Rood</label>
      <label class="shopitem__option"><input type="radio" name="x" value="2"><span class="radio__mark"></span>Blauw</label>
    </div>

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
