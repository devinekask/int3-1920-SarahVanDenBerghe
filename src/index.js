require('./style.css');
// IMPORTEN
import Item from './js/model/Item.js';
import './js/validate.js';
import './js/cart.js';
import './js/line.js';
import './js/drag.js';
import './js/scroll.js';

{
  const $filterForm = document.querySelector(`.filter__form`);
  const $items = document.querySelector(`.webshop__items`);
  const $hiddenJs = document.querySelectorAll(`.hidden-js`);

  const init = () => {
    if ($filterForm) {
      const $categories = document.querySelectorAll(`.filter__input`);
      $categories.forEach(category => {
        category.addEventListener(`change`, handleChangeCategory);
      });
    }

    if ($hiddenJs) {
      $hiddenJs.forEach(item => {
        item.classList.add(`hidden`);
      });
    }
  };

  const handleChangeCategory = () => {
    submitWithJS();
  };

  const submitWithJS = () => {
    const qs = new URLSearchParams([
      ...new FormData($filterForm).entries()
    ]).toString();
    fetch(`${$filterForm.getAttribute('action')}?${qs}`, {
      headers: new Headers({
        Accept: `application/json`
      }),
      method: 'get'
    })
      .then(r => r.json())
      .then(data => handleLoadItems(data));
    window.history.pushState(
      {},
      '',
      `${window.location.href.split('?')[0]}?${qs}`
    );

  };

  const handleLoadItems = data => {
    $items.innerHTML = data
      .map(item => createItem(item))
      .join(``);
  };

  const createItem = itemObj => {
    const item = new Item(itemObj);
    return item.createHTML();
  };

  init();

}
