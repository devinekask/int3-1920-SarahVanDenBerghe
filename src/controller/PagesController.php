<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ItemDAO.php';
require_once __DIR__ . '/../dao/ImageDAO.php';
require_once __DIR__ . '/../dao/OrderDAO.php';
require_once __DIR__ . '/../dao/CategoryDAO.php';
require_once __DIR__ . '/../dao/OptionDAO.php';

class PagesController extends Controller {

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


  public function index() {
    $categories = false;
    if (!empty($_GET['categories'])) {
      $categories = $_GET['categories'];
    }

    $items = $this->itemDAO->selectAllItemsByCategory($categories);
    if(empty($items)){
      $items = $this->itemDAO->selectAllItems();
    }

    $this->set('items', $items);
    $this->set('title', 'Humo');

    /* DOORSTUREN NAAR JAVASCRIPT */
    if (strtolower($_SERVER['HTTP_ACCEPT']) == 'application/json') {
      header('Content-Type: application/json');
      echo json_encode($items);
      exit();
    }
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

    $categories = $this->categoryDAO->selectAllCategories();

    $this->set('categories', $categories);
    $this->set('items', $items);
    $this->set('title', 'Webshop');
  }


  public function shopitem() {
    if(!empty($_GET['id'])){
     $item = $this->itemDAO->selectById($_GET['id']);
     $options = $this->optionDAO->selectOptionsById($_GET['id']);
     $images = $this->imageDAO->selectImagesByItemId($_GET['id']);
    }

    if(!empty($_GET['id']) && !empty($_GET['image'])){
      $selectedImage = $this->imageDAO->selectImagesById($_GET['id'], $_GET['image']);
    }
    if(empty($selectedImage)) {
      $selectedImage = $this->imageDAO->selectFirstImage($_GET['id']);
    }

    if(empty($item)){
      header('Location:index.php?page=webshop'); ;
      exit();
    }

    $this->set('item',$item);
    $this->set('options',$options);
    $this->set('images',$images);
    $this->set('selectedImage',$selectedImage);
    $this->set('title', 'Webshop');
  }


  public function longread() {
    $this->set('title', 'Fahrenheit 451');
  }
}
