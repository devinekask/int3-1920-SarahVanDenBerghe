<?php

require_once( __DIR__ . '/DAO.php');

class ImageDAO extends DAO {
  public function selectImagesByItemId($id){
    $sql = "SELECT `int3_images`.`path`,`int3_images`.`id`
    FROM `int3_images`
    LEFT JOIN `int3_items`
    ON `int3_images`.`item_id` = `int3_items`.`id`
    WHERE `int3_items`.`id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectImagesById($id, $image){
    $sql = "SELECT * FROM `int3_images`
    LEFT JOIN `int3_items`
    ON `int3_images`.`item_id` = `int3_items`.`id`
    WHERE `int3_items`.`id` = :id
    AND `int3_images`.`id` = :image";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->bindValue(':image',$image);
    $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectFirstImage($id){
    $sql = "SELECT * FROM `int3_images`
    LEFT JOIN `int3_items`
    ON `int3_images`.`item_id` = `int3_items`.`id`
    WHERE `int3_items`.`id` = :id
    LIMIT 1";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}


