<?php

require_once( __DIR__ . '/DAO.php');

class ItemDAO extends DAO {

  public function selectAllItems(){
    $sql = "SELECT * FROM `int3`.`items`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllItemsByCategory($categories = false){
    $sql = "SELECT `int3`.`items`.`id`, `int3`.`items`.`title`, `int3`.`items`.`priceinfo`, `int3`.`items`.`intro`, `int3`.`items`.`thumbnail`
    FROM `int3`.`items`
    INNER JOIN `int3`.`categories`
    ON `int3`.`items`.`category_id` = `int3`.`categories`.`id`
    WHERE 1";

    $bindValues = array();

    if (!empty($categories)) {

      $categoryParams = "";
      foreach($categories as $index => $value){
          $categoryParams .= ":category_id_".$index.",";
          $bindValues[":category_id_".$index] = $value;
      }
      $categoryParams = rtrim($categoryParams,",");
      $sql .= " AND `items`.`category_id` IN ($categoryParams)";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($bindValues);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}

  public function selectById($id){
    $sql = "SELECT `int3`.`items`.`id`, `int3`.`items`.`title`, `int3`.`items`.`priceinfo`, `int3`.`items`.`description`,
      `int3`.`options`.`optioninfo`, `int3`.`item_options`.`name`, `int3`.`item_options`.`price`, `int3`.`items`.`thumbnail`, `int3`.`items`.`intro`
      FROM `int3`.`items`
      LEFT JOIN `int3`.`options`
      ON `int3`.`items`.`option_id` = `int3`.`options`.`id`
      LEFT JOIN `int3`.`item_options`
      ON `int3`.`item_options`.`option_id` = `int3`.`options`.`id` WHERE `items`.`id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectOptionsById($id){
    $sql = "SELECT `int3`.`item_options`.`name`,`int3`.`item_options`.`price`, `int3`.`item_options`.`id` FROM `int3`.`items`
    LEFT JOIN `int3`.`options`
    ON `int3`.`items`.`option_id` = `int3`.`options`.`id`
    LEFT JOIN `int3`.`item_options`
    ON `int3`.`item_options`.`option_id` = `int3`.`options`.`id`
    WHERE `items`.`id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
