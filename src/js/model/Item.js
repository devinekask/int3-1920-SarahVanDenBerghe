class Item {
  constructor(itemObject) {
    // this.name = playerObject['Name'];
    // this.image = playerObject['Photo'];
    // this.age = playerObject['Age'];
    // this.nationality = playerObject['Nationality'];
    // this.club = playerObject['Club'];

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
        <h3 class="item__title">Via JavaScript</h3>
          <span class="item__price">${this._priceinfo}</span>
          <p class="item__info">${this._intro}</p>
          <img class="item__img" src="assets/img/thumbnails/${this._thumbnail}" alt="${this._title}">
      </a>
    </li>`; // ${this._title}
  }
}
export default Item;
