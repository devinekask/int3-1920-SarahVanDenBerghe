{
  const init = () => {
    const $cartItems = document.querySelectorAll(`.cart__item`);
    const $shopItem = document.querySelector(`.shopitem`);

    if ($cartItems) {
      $cartItems.forEach($item => {
        const $buttonMinus = $item.querySelector(`.min`);
        $buttonMinus.addEventListener(`click`, handleClickMinus);

        const $buttonPlus = $item.querySelector(`.plus`);
        $buttonPlus.addEventListener(`click`, handleClickPlus);
      });
    }

    if ($shopItem) {
      const $buttonMinus = $shopItem.querySelector(`.min`);
      $buttonMinus.addEventListener(`click`, handleClickMinus);

      const $buttonPlus = $shopItem.querySelector(`.plus`);
      $buttonPlus.addEventListener(`click`, handleClickPlus);
    }
  };

  const handleClickMinus = e => {
    const $input = e.target.parentElement.querySelector(`.input--number`);
    $input.stepDown(1);
  };

  const handleClickPlus = e => {
    const $input = e.target.parentElement.querySelector(`.input--number`);
    $input.stepUp(1);
  };

  init();
}
