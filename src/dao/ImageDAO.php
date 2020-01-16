<?php

require_once( __DIR__ . '/DAO.php');

class ImageDAO extends DAO {
  public function selectImagesById($id){
    $sql = "SELECT * FROM `int3_images`
    LEFT JOIN `int3_items`
    ON `int3_images`.`item_id` = `int3_items`.`id`
    WHERE `int3_items`.`id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}


