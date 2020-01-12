<?php

require_once( __DIR__ . '/DAO.php');

class ItemDAO extends DAO {

  public function selectAllItems(){
    $sql = "SELECT * FROM `int3`.`items`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // public function selectAllItemsByCategory($categories = false){
  //   $sql = "SELECT * FROM `int3`.`items` WHERE `category` = :categories";
  //   $stmt = $this->pdo->prepare($sql);
  //   $stmt->bindValue(':categories',$categories);
  //   $stmt->execute();
  //   return $stmt->fetchAll(PDO::FETCH_ASSOC);
  // }


    //   if (!empty($locations)) {
    //   // 0: "20" // 1:"3"
    //   $locationParams = "";
    //   foreach($locations as $index => $value){
    //       $locationParams .= ":location_id_".$index.","; // ":location_id_0,:location_id_1,"
    //       $bindValues[":location_id_".$index] = $value; // (array) :location_id_0: "20" /// :location_id_1: "3"
    //   }
    //   $locationParams = rtrim($locationParams,",");
    //   $sql .= " AND `activities`.`location_id` IN ($locationParams)"; // IN (:location_id_0,:location_id_1)
    // }


  public function selectAllItemsByCategory($categories = false){
    $sql = "SELECT DISTINCT FROM `int3`.`items`
    WHERE 1";
    // `category` = :option1 OR `category`= :option2 , .... afhankelijk van alle GETS
    // page=webshop&categories=abonnementen&categories=gadgets

    $bindValues = array();

    if (!empty($categories)) {
        foreach($categories as $index => $value) {
          $bindValues[$index] = $value;
          $sql .= "`category` = $value OR";
        }

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($bindValues);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}






  public function selectById($id){
    $sql = "SELECT * FROM `int3`.`items`
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







// public function selectById($id){
//     $sql = "SELECT * FROM `todos` WHERE `id` = :id";
//     $stmt = $this->pdo->prepare($sql);
//     $stmt->bindValue(':id', $id);
//     $stmt->execute();
//     return $stmt->fetch(PDO::FETCH_ASSOC);
//   }

//   public function delete($id){
//     $sql = "DELETE FROM `todos` WHERE `id` = :id";
//     $stmt = $this->pdo->prepare($sql);
//     $stmt->bindValue(':id', $id);
//     return $stmt->execute();
//   }

//   public function insert($data) {
//     $errors = $this->validate( $data );
//     if (empty($errors)) {
//       $sql = "INSERT INTO `todos` (`created`, `modified`, `checked`, `text`) VALUES (:created, :modified, :checked, :text)";
//       $stmt = $this->pdo->prepare($sql);
//       $stmt->bindValue(':created', $data['created']);
//       $stmt->bindValue(':modified', $data['modified']);
//       $stmt->bindValue(':checked', $data['checked']);
//       $stmt->bindValue(':text', $data['text']);
//       if ($stmt->execute()) {
//         return $this->selectById($this->pdo->lastInsertId());
//       }
//     }
//     return false;
//   }

//   public function validate( $data ){
//     $errors = [];
//     if (!isset($data['created'])) {
//       $errors['created'] = 'Gelieve created in te vullen';
//     }
//     if (!isset($data['modified'])) {
//       $errors['modified'] = 'Gelieve modified in te vullen';
//     }
//     if (!isset($data['checked'])) {
//       $errors['checked'] = 'Gelieve checked in te vullen';
//     }
//     if (empty($data['text']) ){
//       $errors['text'] = 'Gelieve een text in te vullen';
//     }
//     return $errors;
//   }
