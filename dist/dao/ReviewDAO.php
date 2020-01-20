<?php

require_once( __DIR__ . '/DAO.php');

class ReviewDAO extends DAO {

  public function  selectAllReviews($id) {
    $sql = "SELECT * FROM `reviews` WHERE `product_id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue('id', $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function  insertReview($data) {
    $sql = "INSERT INTO `reviews` (`product_id`, `description`, `stars`, `naam`, `achternaam`, `email`) VALUES (:product_id, :description, :stars, :naam, :achternaam, :email)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue('product_id', $data['product_id']);
    $stmt->bindValue('description', $data['description']);
    $stmt->bindValue('stars', $data['stars']);
    $stmt->bindValue('naam', $data['naam']);
    $stmt->bindValue('achternaam', $data['achternaam']);
    $stmt->bindValue('email', $data['email']);
    if ($stmt->execute()) {
      return $this->selectReviewById($this->pdo->lastInsertId());
    };
  }

  public function selectReviewById($id){
    $sql = "SELECT * FROM `reviews` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function validate($data){
    $errors = [];
    if (empty($data['product_id'])) {
      $errors['product_id'] = 'The name is required';
    }
    if (empty($data['description'])) {
        $errors['description'] = 'The last name is required';
    }
    if (empty($data['stars'])) {
        $errors['stars'] = 'The date is required';
    }
    if(empty($data['naam'])){
      $errors['naam'] = 'The path is required';
    }
    if(empty($data['achternaam'])){
      $errors['achternaam'] = 'The path is required';
    }
    if(empty($data['email'])){
      $errors['email'] = 'The path is required';
    }
    return $errors;
  }


}

