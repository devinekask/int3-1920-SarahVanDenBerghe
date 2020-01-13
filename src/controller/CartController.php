<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ItemDAO.php';
require_once __DIR__ . '/../dao/ImageDAO.php';

class CartController extends Controller {

  private $itemDAO;
  private $imageDAO;

  function __construct() {
    $this->itemDAO = new ItemDAO();
    $this->imageDAO = new ImageDAO();
  }

  public function winkelmand() {
    if (!empty($_POST['action'])) {
      if ($_POST['action'] == 'add') {
        $this->_handleAdd();
        $_SESSION['add'] = 'Toegevoegd aan winkelmandje!';
        header('Location: index.php?page=shopitem&id=');
        exit();
      }
      // if ($_POST['action'] == 'empty') {
      //   $_SESSION['cart'] = array();
      // }
      // if ($_POST['action'] == 'update') {
      //   $this->_handleUpdate();
      // }
      header('Location: index.php?page=winkelmand');
      exit();
    }

    $this->set('title', 'Winkelmand');
  }

    private function _handleAdd() {
    if (empty($_SESSION['cart'][$_POST['item_id']])) {
      $item = $this->itemDAO->selectById($_POST['item_id']);
      if (empty($item)) {
        return;
      }
      $_SESSION['cart'][$_POST['item_id']] = array(
        'item' => $item,
        'quantity' => $_POST['quantity']
      );
    }
    $_SESSION['cart'][$_POST['item_id']]['quantity'];
  }

  public function login() {

    $this->set('title', 'Log in of registreer');
  }
}
