/* hier iets */
{
  const init = () => {
    const $items = document.querySelectorAll(`.cart__item`);
    console.log($items);
    if ($items) {

      $items.forEach($item => {
        const $buttonMinus = $item.querySelector(`.min`);
        $buttonMinus.addEventListener(`click`, handleClickMinus);

        const $buttonPlus = $item.querySelector(`.plus`);
        $buttonPlus.addEventListener(`click`, handleClickPlus);
      });
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

  const changeItemPrice = input => {
    // To check dat hij afrond op 2 getallen, anders komen er rare toestanden met komma getallen
    const $quantityValue = input.value;
    const $item = input.parentElement.parentElement.parentElement;
    const $priceValue = $item.querySelector(`.item-price`).value;

    const $itemTotal = $item.querySelector(`.item-total`);
    $itemTotal.innerHTML = $quantityValue * $priceValue;

    changeTotalPrice();
  };

  const changeTotalPrice = () => {
    const $cartTotal = document.querySelector(`.totalprice`);
    const $allItemTotals = document.querySelectorAll(`.item-total`); // enkel value van de p nodig...
  };

  init();
}
