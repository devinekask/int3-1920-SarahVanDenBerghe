<?php

require_once( __DIR__ . '/DAO.php');

class ImageDAO extends DAO {
  public function selectImagesById($id){
    $sql = "SELECT * FROM `int3`.`images`
    LEFT JOIN `int3`.`items`
    ON `int3`.`images`.`item_id` = `int3`.`items`.`id`
    WHERE `items`.`id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}


