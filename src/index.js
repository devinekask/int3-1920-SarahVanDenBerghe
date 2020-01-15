require('./style.css');
// IMPORTEN
import Todo from './js/model/Todo.js';

{

  const init = () => {
    const $forms = document.querySelectorAll(`.form`);
    console.log($forms);

    // 01. Browser validatie afzetten.
    $forms.forEach($form => {
      $form.noValidate = true;
      $form.addEventListener(`submit`, handleSubmitForm);


      // 02. Alle inputs selecteren.
      const fields = $form.querySelectorAll(`.input`);
      addValidationListeners(fields);
    });

  };

  init();

}
