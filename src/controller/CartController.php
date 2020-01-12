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
    $this->set('title', 'Winkelmand');
  }

}
