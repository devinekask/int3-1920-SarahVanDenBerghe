<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ItemDAO.php';
require_once __DIR__ . '/../dao/ImageDAO.php';
require_once __DIR__ . '/../dao/OrderDAO.php';

class CartController extends Controller {
  private $itemDAO;
  private $imageDAO;
  private $orderDAO;

  function __construct() {
    $this->itemDAO = new ItemDAO();
    $this->imageDAO = new ImageDAO();
    $this->orderDAO = new OrderDAO();
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
    // hidden input 'item_idtest' gemaakt met title + option zodat deze uniek is voor item / option combo
    if (empty($_SESSION['cart'][$_POST['item_id']])) {
      $item = $this->itemDAO->selectById($_POST['item_id']);   // Deze moet nog uniek gemaakt worden!
      // $item = $this->itemDAO->selectItemByOption($_POST['item_id'],$_POST['option_id']);   // Nieuwe DAO
      if (empty($item)) {
        return;
      }
      $_SESSION['cart'][$_POST['item_id']] = array(
        'item' => $item,
        'option' => $_POST['option_name'],
        'quantity' => $_POST['quantity']
      );
      } else {
        $_SESSION['cart'][$_POST['item_id']]['quantity']++;
      }
  }

  private function _handleRemove() {
    if (isset($_SESSION['cart'][$_POST['remove']])) {  // hidden input overeenkomen met item_idtest
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
          $errorsOrder = $this->orderDAO->validateOrder($_POST); // $_POST is data
          $this->set('errorsOrder',$errorsOrder);
          // exit();
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
          'option_name' => $quantity['option'],      // Extra kolom, ook bij lijn 63
          'quantity' => $quantity['quantity']
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
    $this->set('title', 'confirmation');
  }

}
