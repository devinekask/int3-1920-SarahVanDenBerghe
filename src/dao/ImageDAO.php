<?php

require_once( __DIR__ . '/DAO.php');

class ImageDAO extends DAO {
  public function selectImagesById($id){
    $sql = "SELECT * FROM `images`
    LEFT JOIN `items`
    ON `images`.`item_id` = `items`.`id`
    WHERE `items`.`id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}


