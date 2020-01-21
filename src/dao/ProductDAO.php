<?php

require_once( __DIR__ . '/DAO.php');

class ProductDAO extends DAO {

  public function selectAllProducts(){
    $sql = "SELECT * FROM `products`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function  selectFilteredProducts($filter) {
    $sql = "SELECT `products`.`id`, `products`.`product`,`products`.`description`,`products`.`prijs`  FROM `filter`
            INNER JOIN `filter_link`
            ON `filter`.`filter` = :filter AND `filter`.`id` = `filter_link`.`filter_id`
            INNER JOIN `products`
            ON `filter_link`.`product_id` = `products`.`id`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue('filter', $filter);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectFiveProducts(){
    $sql = "SELECT * FROM `products` ORDER BY RAND ( ) LIMIT 5";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function  selectAllOptions($id) {
    $sql = "SELECT `options`.`price`, `options`.`optie`, `products`.`id`  FROM `products`
            INNER JOIN `options_link`
            ON `products`.`id` = :id AND `options_link`.`product_id` = `products`.`id`
            INNER JOIN `options`
            ON `options`.`id` = `options_link`.`option_id`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue('id', $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function  selectProduct($id) {
    $sql = "SELECT * FROM `products` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue('id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function  selectHighestRevieuw($id) {
    $sql = "SELECT * FROM `reviews` WHERE `product_id` = :id ORDER BY `stars` DESC LIMIT 1";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue('id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function  showAllSpecs($id) {
    $sql = "SELECT `specs`.`spec`, `specs`.`id` FROM `specs`
            INNER JOIN `specs_link`
            ON `specs_link`.`product_id` = :id AND `specs_link`.`specs_id` = `specs`.`id`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue('id', $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function  showAllAbonnements() {
    $sql = "SELECT * FROM `abonnement`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function  fetchPhotos($id) {
    $sql = "SELECT * FROM `photos` WHERE `product_id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue('id', $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
