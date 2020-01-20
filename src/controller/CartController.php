<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ItemDAO.php';
require_once __DIR__ . '/../dao/ImageDAO.php';
require_once __DIR__ . '/../dao/OrderDAO.php';
require_once __DIR__ . '/../dao/CategoryDAO.php';
require_once __DIR__ . '/../dao/OptionDAO.php';

class CartController extends Controller {
  private $itemDAO;
  private $imageDAO;
  private $orderDAO;
  private $categoryDAO;
  private $optionDAO;

  function __construct() {
    $this->itemDAO = new ItemDAO();
    $this->imageDAO = new ImageDAO();
    $this->orderDAO = new OrderDAO();
    $this->categoryDAO = new CategoryDAO();
    $this->optionDAO = new OptionDAO();
  }

  public function cart() {
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

      // PROMO
      if ($_POST['action'] == 'promo') {
        $this->_handlePromo();
      }

      header('Location: index.php?page=cart');
      exit();
    }

    if (!empty($_POST['remove'])) {
      $this->_handleRemove();
      header('Location: index.php?page=cart');
      exit();
    }

    $this->set('title', 'Winkelmand');
  }


  private function _handleAdd() {
    if (empty($_SESSION['cart'][$_POST['item_id'] . '-' . $_POST['option_id']])) {
      $item = $this->itemDAO->selectItemByOption($_POST['item_id'],$_POST['option_id']);
      if (empty($item)) {
        return;
      }
      $_SESSION['cart'][$_POST['item_id'] . '-' . $_POST['option_id']] = array(
        'item' => $item,                    // prijs binnen hier blijft onveranderd
        'option' => $_POST['option_id'],
        'price' => $item['price'],          // nog eens hier zodat dit aangepast kan worden met promocode
        'quantity' => $_POST['quantity']
      );
      } else {
        $_SESSION['cart'][$_POST['item_id'] . '-' . $_POST['option_id']]['quantity'] =
        $_SESSION['cart'][$_POST['item_id'] . '-' . $_POST['option_id']]['quantity'] + $_POST['quantity'];
      }
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
    foreach($_SESSION['cart'] as $item => $info) {
      if ($info['quantity'] <= 0) {
        unset($_SESSION['cart'][$item]);
      }
    }
  }

  private function _handlePromo() {
    $_SESSION['promo'] = 'De promocode is ongeldig.';

    foreach($_SESSION['cart'] as $item => $info) {
      if ($info['item']['promocode'] === strtolower($_POST['promocode'])) {
        $_SESSION['cart'][$item]['price'] = $info['item']['promoprice'];
        $_SESSION['promo'] = 'Promocode werd toegepast!';
      }
    }
  }

  public function login() {
    $this->set('title', 'Login');
  }

  public function checkout() {
      if(!empty($_POST['action'])){

        if($_POST['action'] == 'checkoutOrder'){
          // USER INSERTEN
          $order = $this->orderDAO->insertUser($_POST);
          if($gegevensId = $order){
          $this->_handleCheckout($gegevensId);
        }

        // ERRORS
        if (!$order){
          $errorsOrder;
          $errorsOrder = $this->orderDAO->validateOrder($_POST);
          $this->set('errorsOrder',$errorsOrder);
        } else {
          header('location: index.php?page=confirmation');
          exit();
        }
      }
    }

      $this->set('title', 'Gegevens');
  }


  private function _handleCheckout($gegevensId) {
    $data = array();
    if(!empty($_SESSION['cart'])){
      foreach ($_SESSION['cart'] as $itemId => $quantity) {
        array_push($data, array(
          'order_id' => $gegevensId['id'],
          'item_name' => $quantity['item']['title'],
          'option_name' => $quantity['item']['name'],
          'quantity' => $quantity['quantity'],
          'subtotal' => $quantity['price'] * $quantity['quantity']
        ));
      }

      foreach($data as $order) {
        $this->orderDAO->insertOrder($order);
      }

      header('Location: index.php?page=confirmation');
      unset($_SESSION['cart']);
      exit();
    }
  }

  public function confirmation() {
    $this->set('title', 'Bevestiging');
  }

}
