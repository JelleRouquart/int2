<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ProductDAO.php';
require_once __DIR__ . '/../dao/ReviewDAO.php';
require_once __DIR__ . '/../dao/CartDAO.php';

class ProductsController extends Controller {

  private $todoDAO;

  function __construct() {
    $this->productDAO = new ProductDAO();
    $this->reviewDAO = new ReviewDAO();
    $this->cartDAO = new CartDAO();
  }

  public function index() {
    if (!empty($_GET['action'])) {
      if($_GET['action'] == 'filter')
      if(!empty($_GET['filter'])){
        if($_GET['filter'] != ' ' || $_GET['filter'] != 'alles') {
          $products = $this->productDAO->selectFilteredProducts($_GET['filter']);
        }
        }
    } else {
      $products = $this->productDAO->selectAllProducts();
    }

    if(empty($products)) {
      $products = $this->productDAO->selectAllProducts();
    }

    $this->set('products', $products);
    $this->set('title', 'home');
  }

  public function betalen() {

    $this->set('title', 'betalen');
  }

  public function abonnement() {
    $this->set('title', 'abonnement');
    $abonnements = $this->productDAO->showAllAbonnements();
    $this->set('abonnements', $abonnements);

    if (!empty($_POST['action'])){

      if($_POST['action'] == 'submitform'){
        if (empty($_SESSION['cart'][$_POST['price']])) {
          $productVariant = $this->productDAO->selectProductVariant($_POST['price']);
      $_SESSION['cart'][$_POST['price']] = array(
        'product' => array(
          'image_id' => $productVariant['0']['image_id'],
          'id' => $productVariant['0']['id'],
          'description' => $productVariant['0']['description'],
          'product' => $productVariant['0']['product'],
          'prijs' => $productVariant['0']['prijs'],
        ),
        'quantity' => 0
      );
      $product = $this->productDAO->selectProduct($_POST['price']);

    }
    $_SESSION['cart'][$_POST['price']]['quantity']++;
      }
    }
  }

  public function detail() {

    if (!empty($_GET['id'])) {
      $product = $this->productDAO->selectProduct($_GET['id']);
      $revieuws = $this->reviewDAO->selectAllReviews($_GET['id']);
      $revieuw = $this->productDAO->selectHighestRevieuw($_GET['id']);
      $specs = $this->productDAO->showAllSpecs($_GET['id']);
      $randoms = $this->productDAO->selectFiveProducts();
      $photos = $this->productDAO->fetchPhotos($_GET['id']);
      $prices = $this->productDAO->variantPrices($_GET['id']);

      $this->set('product', $product);
      $this->set('revieuws', $revieuws);
      $this->set('revieuw', $revieuw);
      $this->set('specs', $specs);
      $this->set('randoms', $randoms);
      $this->set('photos', $photos);
      $this->set('prices', $prices);
    } else {
      header('Location: index.php?');
      exit();
    }


    if (!empty($_POST['action'])){

      if($_POST['action'] == 'submitform'){
        if (empty($_SESSION['cart'][$_POST['price']])) {
          $productVariant = $this->productDAO->selectProductVariant($_POST['price']);
        if (empty($product)) {
        return;
      }
      $_SESSION['cart'][$_POST['price']] = array(
        'product' => array(
          'image_id' => $productVariant['0']['image_id'],
          'id' => $productVariant['0']['id'],
          'description' => $productVariant['0']['description'],
          'product' => $productVariant['0']['product'],
          'prijs' => $productVariant['0']['prijs'],
        ),
        'quantity' => 0
      );
      $product = $this->productDAO->selectProduct($_POST['price']);

    }
    $_SESSION['cart'][$_POST['price']]['quantity']++;
      }
      $_SESSION['info'] = 'bedankt';
    }
    $this->set('title', $product['product']);
}

  public function reviews() {
    if (!empty($_GET['id'])) {
      $reviews = $this->reviewDAO->selectAllReviews($_GET['id']);
      $this->set('reviews', $reviews);
    } else {
      header('Location: index.php?');
      exit();
    }
    $this->set('title', 'review');
  }

  public function writereview() {
    if(!empty($_GET['id'])) {
      if(!empty($_POST['action'])){
        if ($_POST['action'] == 'submitform') {


          $data = array(
            'product_id' => $_GET['id'],
            'description' => $_POST['description'],
            'stars' => $_POST['stars'],
            'naam' => $_POST['name'],
            'achternaam' => $_POST['lastname'],
            'email' => $_POST['email']
          );

          $errors = $this->reviewDAO->validate($data);
        if(empty($errors)){
          $insertReview = $this->reviewDAO->insertReview($data);

          $_SESSION['info'] = 'Dankjewel voor je review!';
          header('Location: index.php?');
          exit();
        }else{
          $errors = $this->reviewDAO->validate($data);
          $this->set('errors', $errors);
        }
          $insertReview = $this->reviewDAO->insertReview($data);
        }
      }
    }
    $this->set('title', 'review');
  }

  public function betaling() {
    if(!empty($_POST['action'])) {
      if($_POST['action'] == 'submit') {
        unset($_SESSION['user']['betaling']);
        $_SESSION['user']['betaling'] = array(
          'betaling' => $_POST['betaling']
      );
      $this->_toDatabase();
      header('Location: index.php?page=betalen');
      }
    }
    $this->set('title', 'betaling');
  }

  public function levering() {
    if(!empty($_POST['action'])) {
      if($_POST['action'] == 'submit') {

        if(!empty($_POST['straat']) && !empty($_POST['nr']) && !empty($_POST['postcode'])) {
        unset($_SESSION['user']['leveradres']);
        $_SESSION['user']['leveradres'] = array(
          'straat' => $_POST['straat'],
          'postcode' => $_POST['postcode'],
          'nr' => $_POST['nr'],
          'bus' => $_POST['bus']
      );
        } else {
          unset($_SESSION['user']['leveradres']);
          $_SESSION['user']['leveradres'] = array(
          'straat' => $_POST['straathide'],
          'postcode' => $_POST['postcodehide'],
          'nr' => $_POST['nrhide'],
          'bus' => $_POST['bushide']
      );
        }
      header('Location: index.php?page=betaling');
      }
    }
    $this->set('title', 'levering bestelling');
  }

  public function persoonlijk() {
    if(!empty($_POST['action'])) {
      if($_POST['action'] == 'submit') {
        unset($_SESSION['user']);
        $data = array(
          'straat' => $_POST['straat'],
          'postcode' => $_POST['postcode'],
          'nr' => $_POST['nr'],
          'bus' => $_POST['bus']
        );
        $_SESSION['user'] = array(
        'naam' => $_POST['naam'],
        'achternaam' => $_POST['achternaam'],
        'email' => $_POST['email'],
        'thuisadres' => $data
      );
      header('Location: index.php?page=levering');
      }
    }
    $this->set('title', 'persoonlijke info');
  }

  public function cart() {
  if(!empty($_POST['action'])) {
    if ($_POST['action'] == 'update') {
        $this->_handleUpdate();
      }
  }
  if (!empty($_POST['remove'])) {
      $this->_handleRemove();
      header('Location: index.php?page=cart');
      exit();
    }

    $this->set('title', 'cart');
  }

  private function _handleUpdate() {
    foreach ($_POST['quantity'] as $productId => $quantity) {
      if (!empty($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] = $quantity;
      }
    }
    $this->_removeWhereQuantityIsZero();
  }

  private function _removeWhereQuantityIsZero() {
    foreach($_SESSION['cart'] as $productId => $info) {
      if ($info['quantity'] <= 0) {
        unset($_SESSION['cart'][$productId]);
      }
    }
  }

  private function _handleRemove() {
    if (isset($_SESSION['cart'][$_POST['remove']])) {
      unset($_SESSION['cart'][$_POST['remove']]);
    }
  }

  private function _toDatabase() {
    $data = array(
      'naam' => $_SESSION['user']['naam'],
      'achternaam' => $_SESSION['user']['achternaam'],
      'email' => $_SESSION['user']['email'],
      'thuis_straat' => $_SESSION['user']['thuisadres']['straat'],
      'thuis_postcode' => $_SESSION['user']['thuisadres']['postcode'],
      'thuis_nr' => $_SESSION['user']['thuisadres']['nr'],
      'thuis_bus' => $_SESSION['user']['thuisadres']['bus'],
      'lever_straat' => $_SESSION['user']['thuisadres']['straat'],
      'lever_postode' => $_SESSION['user']['leveradres']['postcode'],
      'lever_nr' => $_SESSION['user']['leveradres']['nr'],
      'lever_bus' => $_SESSION['user']['leveradres']['bus'],
      'betaling' => $_SESSION['user']['betaling']['betaling'],
    );
    $insertUser = $this->cartDAO->insertUser($data);
    foreach($_SESSION['cart'] as $miljaar) {
      $orders = array(
        'product_id' => $miljaar['product']['id'],
        'quantity' => $miljaar['quantity'],
        'user_id' => $insertUser['id'],
      );
      $insertOrder = $this->cartDAO->insertOrder($orders);
    }
  }

}
