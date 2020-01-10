class Todo {
  constructor(todoObject) {
    // this.name = playerObject['Name'];
    // this.image = playerObject['Photo'];
    // this.age = playerObject['Age'];
    // this.nationality = playerObject['Nationality'];
    // this.club = playerObject['Club'];

    this._text = todoObject['text'];
  }

  createHTML() {
    return `<li>${this._text}</li>`; // HIER INNER HTML
  }
}
export default Todo;
