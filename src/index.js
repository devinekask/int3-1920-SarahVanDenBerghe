require('./style.css');
// IMPORTEN
import Todo from './js/model/Todo.js';

{
  const $todosList = document.getElementById(`todosList`),
    $insertTodoForm = document.getElementById(`insertTodoForm`),
    $inputText = document.getElementById(`inputText`);

  const init = () => {
    if ($todosList) {
      loadTodos();
    }
    if ($insertTodoForm) {
      $insertTodoForm.addEventListener(`submit`, handleSubmitInsertTodoForm);
    }
  };

  const loadTodos = () => {
    // Fetch all todos
    fetch(`index.php`, {
      headers: new Headers({
        Accept: `application/json`
      })
    })
      .then(r => r.json())
      .then(data => handleLoadTodos(data));
  };

  const handleLoadTodos = data => {
    console.log(data);
    $todosList.innerHTML = data.map(todo => createTodoListItem(todo)).join(``);
  };

  const createTodoListItem = todo => {
    const todoObj = new Todo(todo);
    console.log(todoObj);
    return todoObj.createHTML();

    // return `<li>${todo.text}</li>`;
  };

  const handleSubmitInsertTodoForm = e => {
    // Fetch new to do
    e.preventDefault();
    fetch($insertTodoForm.getAttribute('action'), {
      headers: new Headers({
        Accept: `application/json`
      }),
      method: 'post',
      body: new FormData($insertTodoForm)
    })
      .then(r => r.json())
      .then(data => handleLoadSubmit(data));
  };

  const handleLoadSubmit = data => {
    const $errorText = document.querySelector(`.error--text`);
    $errorText.textContent = '';
    if (data.result === 'ok') {
      $inputText.value = '';
      loadTodos();
    } else {
      if (data.errors.text) {
        $errorText.textContent = data.errors.text;
      }
    }
  };

  init();
}
