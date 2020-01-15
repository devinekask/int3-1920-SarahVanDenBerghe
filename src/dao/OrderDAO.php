<?php

require_once( __DIR__ . '/DAO.php');

class OrderDAO extends DAO {

public function selectOrderById($id){
  $sql = "SELECT * FROM `orders` WHERE `id` =:id";
  $stmt = $this->pdo->prepare($sql);
  $stmt->bindValue(':id',$id);
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function selectOrderItemsById($id){
  $sql = "SELECT * FROM `order_items` WHERE `id` =:id";
  $stmt = $this->pdo->prepare($sql);
  $stmt->bindValue(':id',$id);
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

  public function insertUser($data) {
  $errorsOrder = $this->validateOrder($data);
    if(empty($errorsOrder)){
    $sql = "INSERT INTO `orders` (`firstname`,`lastname`,`email`, `street`, `number`, `city`, `postalcode`)
      VALUES(:firstname,:lastname,:email,:street,:number,:city,:postalcode)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':firstname',$data['firstname']);
    $stmt->bindValue(':lastname',$data['lastname']);
    $stmt->bindValue(':email',$data['email']);
    $stmt->bindValue(':street',$data['street']);
    $stmt->bindValue(':number',$data['number']);
    $stmt->bindValue(':city',$data['city']);
    $stmt->bindValue(':postalcode',$data['postalcode']);
   if($stmt->execute()){
      return $this->selectOrderById($this->pdo->lastInsertId());
    }
  }
  return false;
}

public function insertOrder($data) {
  $sql = "INSERT INTO `order_items` (`order_id`,`item_name`,`option_name`,`quantity`)
  VALUES(:order_id,:item_name,:option_name,:quantity)";
  $stmt = $this->pdo->prepare($sql);
  $stmt->bindValue(':order_id',$data['order_id']);
  $stmt->bindValue(':item_name',$data['item_name']);
  $stmt->bindValue(':option_name',$data['option_name']);
  $stmt->bindValue(':quantity',$data['quantity']);
  if($stmt->execute()){
     return $this->selectOrderItemsById($this->pdo->lastInsertId());
  }
  return false;
}


public function validateOrder($data){
  $errorsOrder = [];
  if (empty($data['firstname'])) {
    $errorsOrder['firstname'] = '*';
  }
  if (empty($data['lastname'])) {
    $errorsOrder['lastname'] = '*';
  }
  if (empty($data['email'])) {
    $errorsOrder['email'] = '*';
  }
  if (empty($data['street'])) {
    $errorsOrder['street'] = '*';
  }
  if (empty($data['number'])) {
    $errorsOrder['number'] = '*';
  }
  if (empty($data['city'])) {
    $errorsOrder['city'] = '*';
  }
   if (empty($data['postalcode'])) {
    $errorsOrder['postalcode'] = '*';
  }
  return $errorsOrder;
}

}
