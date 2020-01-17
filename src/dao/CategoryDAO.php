<?php

require_once( __DIR__ . '/DAO.php');

class CategoryDAO extends DAO {

  public function selectAllCategories(){
    $sql = "SELECT * FROM `int3_categories`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

}
