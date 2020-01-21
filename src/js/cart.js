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
    // changeItemPrice($input);
  };

  const handleClickPlus = e => {
    const $input = e.target.parentElement.querySelector(`.input--number`);
    $input.stepUp(1);
    // changeItemPrice($input);
  };

  // const changeItemPrice = input => {
  //   const $quantityValue = input.value;
  //   const $item = input.parentElement.parentElement.parentElement;
  //   const $priceValue = $item.querySelector(`.item-price`).value;

  //   const $itemTotal = $item.querySelector(`.item-total`);
  //   $itemTotal.innerHTML = Math.round($quantityValue * $priceValue * 100) / 100;

  //   changeTotalPrice();
  // };

  // const changeTotalPrice = () => {
  //   const $cartTotal = document.querySelector(`.totalprice`);
  //   const $allItemTotals = document.querySelectorAll(`.item-total`);
  // };

  init();
}
