require('./style.css');
// IMPORTEN
import Item from './js/model/Item.js';
import './js/validate.js';
import './js/cart.js';

{
  const $filterForm = document.querySelector(`.filter__form`);
  const $items = document.querySelector(`.webshop__items`);

  const init = () => {
    if ($filterForm) {
      const $categories = document.querySelectorAll(`.filter__input`);
      $categories.forEach(category => {
        category.addEventListener(`change`, handleChangeCategory);
      });
    }
  };

  const handleChangeCategory = () => {
    // e.preventDefault();
    /* $filterForm.preventDefault is not a function
    at HTMLInputElement.handleChangeFilter */
    submitWithJS();
  };

  const submitWithJS = () => {
    const qs = new URLSearchParams([
      ...new FormData($filterForm).entries()
    ]).toString;
    fetch(`${$filterForm.getAttribute('action')}?${qs}`, { // action = index.php?page=webshop
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
      `${window.location.href.split('?')[0]}?${qs}` // ?
    );

    console.log(qs);

  };

  /* O2. DATA OPHALEN VOOR ELKE ITEM */
  const handleLoadItems = data => {
    $items.innerHTML = data
      .map(item => createItem(item))
      .join(``);
  };
    /* 03. OBJECT MAKEN VAN DATA & IN HTML PLAATSEN */
  const createItem = itemObj => {
    const item = new Item(itemObj);
    return item.createHTML();
  };

  init();

}
