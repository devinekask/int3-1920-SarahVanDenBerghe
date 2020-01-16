<?php

require_once( __DIR__ . '/DAO.php');

class ItemDAO extends DAO {


  // ALL ITEMS
  public function selectAllItems(){
    $sql = "SELECT * FROM `int3_items`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


  // ITEMS FILTEREN
  public function selectAllItemsByCategory($categories = false){
    $sql = "SELECT `int3_items`.`id`, `int3_items`.`title`, `int3_items`.`priceinfo`, `int3_items`.`intro`, `int3_items`.`thumbnail`
    FROM `int3_items`
    INNER JOIN `int3_categories`
    ON `int3_items`.`category_id` = `int3_categories`.`id`
    WHERE 1";

    $bindValues = array();

    if (!empty($categories)) {

      $categoryParams = "";
      foreach($categories as $index => $value){
          $categoryParams .= ":category_id_".$index.",";
          $bindValues[":category_id_".$index] = $value;
      }
      $categoryParams = rtrim($categoryParams,",");
      $sql .= " AND `int3_items`.`category_id` IN ($categoryParams)";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($bindValues);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}


// ITEM DETAIL
  public function selectById($id){
    $sql = "SELECT `int3_items`.`id`, `int3_items`.`title`, `int3_items`.`priceinfo`, `int3_items`.`description`, `int3_options`.`optioninfo`
      FROM `int3_items`
      LEFT JOIN `int3_options`
      ON `int3_items`.`option_id` = `int3_options`.`id`
      LEFT JOIN `int3_item_options`
      ON `int3_item_options`.`option_id` = `int3_options`.`id` WHERE `int3_items`.`id` = :id
      LIMIT 1";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
  }


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


  // ITEM & OPTION -> VOOR CART
  // PAS OP: MAAR 1 ID TEGELIJKERTIJD OPHALEN!
  public function selectItemByOption($item, $option){
    $sql = "SELECT `int3_items`.`title`, `int3_items`.`intro`, `int3_items`.`thumbnail`,`int3_items`.`id`,`int3_item_options`.`price`,`int3_item_options`.`name`, `int3_item_options`.`promocode`, `int3_item_options`.`promoprice`
    FROM `int3_items`
    LEFT JOIN `int3_options`
    ON `int3_items`.`option_id` = `int3_options`.`id`
    LEFT JOIN `int3_item_options`
    ON `int3_item_options`.`option_id` = `int3_options`.`id`
    WHERE `int3_items`.`id` = :item
    AND `int3_item_options`.`id` = :option";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':item',$item);
    $stmt->bindValue(':option',$option);
    $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
