<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ItemDAO.php';
require_once __DIR__ . '/../dao/ImageDAO.php';

class PagesController extends Controller {

  private $itemDAO;
  private $imageDAO;

  function __construct() {
    $this->itemDAO = new ItemDAO();
    $this->imageDAO = new ImageDAO();
  }

  public function index() {
    // if (!empty($_POST['action'])) {
    //   if ($_POST['action'] == 'insertTodo') {
    //     $this->handleInsertTodo();
    //   }
    // }

    $items = $this->itemDAO->selectAllItems();
    $this->set('items', $items);
    $this->set('title', 'Humo');

    // if (strtolower($_SERVER['HTTP_ACCEPT']) == 'application/json') {
    //   header('Content-Type: application/json');
    //   echo json_encode($items);
    //   exit();
    // }
  }



  public function webshop() {
    $categories = false;
    if (!empty($_GET['categories'])) {
      $categories = $_GET['categories'];
    }

    $items = $this->itemDAO->selectAllItemsByCategory($categories);
    if(empty($items)){
      $items = $this->itemDAO->selectAllItems();
    }

    $this->set('items', $items);
    $this->set('title', 'Webshop');
  }



  public function shopitem() {

  if(!empty($_GET['id'])){
   $item = $this->itemDAO->selectById($_GET['id']);
   $options = $this->itemDAO->selectOptionsById($_GET['id']);
   $images = $this->imageDAO->selectImagesById($_GET['id']);
  }

    if(empty($item)){
      header('Location:index.php?page=webshop'); ;
      exit();
    }

    $this->set('item',$item);
    $this->set('options',$options);
    $this->set('images',$images);
    $this->set('title', 'Webshop');
  }


  // private function handleInsertTodo() {
  //   $data = array(
  //     'created' => date('Y-m-d H:i:s'),
  //     'modified' => date('Y-m-d H:i:s'),
  //     'checked' => 0,
  //     'text' => $_POST['text']
  //   );
  //   $insertTodoResult = $this->todoDAO->insert($data);
  //   if (!$insertTodoResult) {
  //     $errors = $this->todoDAO->validate($data);
  //     $this->set('errors', $errors);
  //     if (strtolower($_SERVER['HTTP_ACCEPT']) == 'application/json') {
  //       header('Content-Type: application/json');
  //       echo json_encode(array(
  //         'result' => 'error',
  //         'errors' => $errors
  //       ));
  //       exit();
  //     }
  //     $_SESSION['error'] = 'De todo kon niet toegevoegd worden!';
  //   } else {
  //     if (strtolower($_SERVER['HTTP_ACCEPT']) == 'application/json') {
  //       header('Content-Type: application/json');
  //       echo json_encode(array(
  //         'result' => 'ok',
  //         'todo' => $insertTodoResult
  //       ));
  //       exit();
  //     }
  //     $_SESSION['info'] = 'De todo is toegevoegd!';
  //     header('Location: index.php');
  //     exit();
  //   }
  // }

}
