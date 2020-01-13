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

      // ADD
      if ($_POST['action'] == 'add') {
        $this->_handleAdd();
        $_SESSION['add'] = 'Toegevoegd aan winkelmandje';
        header('Location: index.php?page=shopitem&id=' . $_POST['item_id']);
        exit();
      }

      // EMPTY
      if ($_POST['action'] == 'empty') { // ??
        $_SESSION['cart'] = array();
      }

      // UPDATE
      if ($_POST['action'] == 'update') {
        $this->_handleUpdate();
      }
      header('Location: index.php?page=winkelmand');
      exit();
    }

    if (!empty($_POST['remove'])) {
      $this->_handleRemove();
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
    // ik denk dat er hier nog ++ bij moet
    $_SESSION['cart'][$_POST['item_id']]['quantity'];
  }

  private function _handleRemove() {
    if (isset($_SESSION['cart'][$_POST['remove']])) {
      unset($_SESSION['cart'][$_POST['remove']]);
    }
  }

  private function _handleUpdate() {
    foreach ($_POST['quantity'] as $itemId => $quantity) {
      if (!empty($_SESSION['cart'][$itemId])) {
        $_SESSION['cart'][$itemId]['quantity'] = $quantity;
      }
    }
    $this->_removeWhereQuantityIsZero();
  }

  private function _removeWhereQuantityIsZero() {
    foreach($_SESSION['cart'] as $itemId => $info) {
      if ($info['quantity'] <= 0) {
        unset($_SESSION['cart'][$itemId]);
      }
    }
  }


  public function login() {

    $this->set('title', 'Log in of registreer');
  }
}
