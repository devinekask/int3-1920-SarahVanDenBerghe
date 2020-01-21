class Item {
  constructor(itemObject) {
    this._id = itemObject['id'];
    this._title = itemObject['title'];
    this._priceinfo = itemObject['priceinfo'];
    this._intro = itemObject['intro'];
    this._thumbnail = itemObject['thumbnail'];
  }

  createHTML() {
    return `
    <li class="webshop__item__wrapper">
      <a class="webshop__item" href="index.php?page=shopitem&id=${this._id}">
        <h3 class="item__title">${this._title}</h3>
          <span class="item__price">${this._priceinfo}</span>
          <p class="item__info">${this._intro}</p>
          <picture class="item__img">
            <source type="image/webp" srcset="assets/img/thumbnails/webp/${this._thumbnail}.webp">
            <img src="assets/img/thumbnails/jpg/${this._thumbnail}.jpg"	alt="${this._title}">
          </picture>
      </a>
    </li>`;
  }
}
export default Item;
