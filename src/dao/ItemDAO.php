<?php

require_once( __DIR__ . '/DAO.php');

class ItemDAO extends DAO {


  // ALL ITEMS
  public function selectAllItems(){
    $sql = "SELECT * FROM `items`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


  // ITEMS FILTEREN
  public function selectAllItemsByCategory($categories = false){
    $sql = "SELECT `items`.`id`, `items`.`title`, `items`.`priceinfo`, `items`.`intro`, `items`.`thumbnail`
    FROM `items`
    INNER JOIN `categories`
    ON `items`.`category_id` = `categories`.`id`
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


// ITEM DETAIL
  public function selectById($id){
    $sql = "SELECT `items`.`id`, `items`.`title`, `items`.`priceinfo`, `items`.`description`, `options`.`optioninfo`
      FROM `items`
      LEFT JOIN `options`
      ON `items`.`option_id` = `options`.`id`
      LEFT JOIN `item_options`
      ON `item_options`.`option_id` = `options`.`id` WHERE `items`.`id` = :id
      LIMIT 1";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
  }


  // OPTIES VOOR ITEM
  public function selectOptionsById($id){
    $sql = "SELECT `item_options`.`name`,`item_options`.`price`, `item_options`.`id`
    FROM `items`
    LEFT JOIN `options`
    ON `items`.`option_id` = `options`.`id`
    LEFT JOIN `item_options`
    ON `item_options`.`option_id` = `options`.`id`
    WHERE `items`.`id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


  // ITEM & OPTION -> VOOR CART
  // PAS OP: MAAR 1 ID TEGELIJKERTIJD OPHALEN!
  public function selectItemByOption($item, $option){
    $sql = "SELECT `items`.`title`, `items`.`intro`, `items`.`thumbnail`,`items`.`id`,`item_options`.`price`,`item_options`.`name`, `item_options`.`promocode`, `item_options`.`promoprice`
    FROM `items`
    LEFT JOIN `options`
    ON `items`.`option_id` = `options`.`id`
    LEFT JOIN `item_options`
    ON `item_options`.`option_id` = `options`.`id`
    WHERE `items`.`id` = :item
    AND `item_options`.`id` = :option";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':item',$item);
    $stmt->bindValue(':option',$option);
    $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
