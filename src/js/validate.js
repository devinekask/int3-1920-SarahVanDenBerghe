{
  // 03. Form
  const handleSubmitForm = e => {
    const $form = e.currentTarget;
    console.log($form);
    console.log($form.querySelector(`.errors--summary`));

    if (!$form.checkValidity()) {
      e.preventDefault();

      const fields = $form.querySelectorAll(`.input`);
      fields.forEach(showValidationInfo);
    }
  };

  const showValidationInfo = $field => {
    const $errorSummary = document.querySelector(`.errors--summary`);
    let message;
    if ($field.validity.valueMissing) {
      message = `*`;
    }
    if ($field.validity.typeMismatch) {
      message = `*`;
    }
    if (message) {
      $errorSummary.textContent = 'Gelieve alles na te kijken';
      $field.classList.add(`input--error`);
      $field.parentElement.querySelector(`.errors`).textContent = message;
    }
  };

  const handleInputField = e => {
    const $field = e.currentTarget;
    if ($field.checkValidity()) {
      $field.classList.remove(`input--error`);
      const $fieldError = $field.parentElement.querySelector(`.errors`);
      if ($fieldError) {
        $fieldError.textContent = ``;
      }
    }
  };

  const handleBlurField = e => {
    const $field = e.currentTarget;
    showValidationInfo($field);
  };

  const addValidationListeners = fields => {
    // 03. Alle inputs overlopen, functie aan toekennen.
    fields.forEach($field => {
      $field.addEventListener(`input`, handleInputField);
      // Focus weg van element.
      $field.addEventListener(`blur`, handleBlurField);
    });
  };

  const init = () => {
    const $forms = document.querySelectorAll(`.form`);

    // 01. Browser validatie afzetten.
    $forms.forEach($form => {
      $form.noValidate = true;
      $form.addEventListener(`submit`, handleSubmitForm);


      // 02. Alle inputs selecteren.
      const fields = $form.querySelectorAll(`.input`);
      if (fields) {
        addValidationListeners(fields);
      }
    });
  };


  init();
}
