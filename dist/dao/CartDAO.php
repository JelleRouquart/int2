<?php

require_once( __DIR__ . '/DAO.php');

class CartDAO extends DAO {

  public function  insertUser($data) {
    $sql = "INSERT INTO `user` (`naam`, `achternaam`, `email`, `thuis_straat`, `thuis_postcode`, `thuis_nr`, `thuis_bus`, `lever_straat`, `lever_postode`, `lever_nr`, `lever_bus`, `betaling`) VALUES (:naam, :achternaam, :email, :thuis_straat, :thuis_postcode, :thuis_nr, :thuis_bus, :lever_straat, :lever_postode, :lever_nr, :lever_bus, :betaling)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue('naam', $data['naam']);
    $stmt->bindValue('achternaam', $data['achternaam']);
    $stmt->bindValue('email', $data['email']);
    $stmt->bindValue('thuis_straat', $data['thuis_straat']);
    $stmt->bindValue('thuis_postcode', $data['thuis_postcode']);
    $stmt->bindValue('thuis_nr', $data['thuis_nr']);
    $stmt->bindValue('thuis_bus', $data['thuis_bus']);
    $stmt->bindValue('lever_straat', $data['lever_straat']);
    $stmt->bindValue('lever_postode', $data['lever_postode']);
    $stmt->bindValue('lever_nr', $data['lever_nr']);
    $stmt->bindValue('lever_bus', $data['lever_bus']);
    $stmt->bindValue('betaling', $data['betaling']);
    if ($stmt->execute()) {
      return $this->selectUserById($this->pdo->lastInsertId());
    };
  }


  public function  insertOrder($data) {
    $sql = "INSERT INTO `orders` (`product_id`, `quantity`, `user_id`) VALUES (:product_id, :quantity, :user_id)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue('product_id', $data['product_id']);
    $stmt->bindValue('quantity', $data['quantity']);
    $stmt->bindValue('user_id', $data['user_id']);
    if ($stmt->execute()) {
      return $this->selectOrderById($this->pdo->lastInsertId());
    };
  }

  public function selectOrderById($id){
    $sql = "SELECT * FROM `orders` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectUserById($id){
    $sql = "SELECT * FROM `user` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }


}
