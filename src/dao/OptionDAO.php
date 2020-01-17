<?php

require_once( __DIR__ . '/DAO.php');

class OptionDAO extends DAO {

// OPTIES VOOR ITEM
  public function selectOptionsById($id){
    $sql = "SELECT `int3_item_options`.`name`,`int3_item_options`.`price`, `int3_item_options`.`id`
    FROM `int3_items`
    LEFT JOIN `int3_options`
    ON `int3_items`.`option_id` = `int3_options`.`id`
    LEFT JOIN `int3_item_options`
    ON `int3_item_options`.`option_id` = `int3_options`.`id`
    WHERE `int3_items`.`id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
