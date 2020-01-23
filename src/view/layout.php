<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Humo - <?php echo $title; ?></title>
    <link href="//db.onlinewebfonts.com/c/10ed9a0ae6e4b2e5c13c438cdd266b6f?family=News+Gothic+BT" rel="stylesheet" type="text/css"/>
    <link href="//db.onlinewebfonts.com/c/28ce029aa488ec6feda976ca3e33ccb5?family=Swis721+Cn+BT" rel="stylesheet" type="text/css"/>
    <link href="//db.onlinewebfonts.com/c/a068eccac9762e15c1a5256f39b47f01?family=NewsGothicW07-Regular" rel="stylesheet" type="text/css"/>
    <link href="//db.onlinewebfonts.com/c/af3c23af4832283306943af2f3239f01?family=NewsGothicW07-Bold" rel="stylesheet" type="text/css"/>
    <?php echo $css;?>
  </head>
  <body>
    <nav class="navigation">
      <a class="navigation__link--two"><img src="../assets/img/nav.svg " alt="een foto van de navigatie"></a>
      <ul class="navigation__items">
        <li class="navigation__item">About</li>
        <li class="navigation__item">Humor</li>
        <li class="navigation__item">Muziek</li>
      </ul>
      <a class="link" href="index.php?page=home"><h1 class="title">Humo</h1></a>
      <ul class="navigation__items">
        <li class="navigation__item">Boeken</li>
        <li class="navigation__item">TV/film</li>
        <li class="navigation__item">Home</li>
      </ul>
      <a class="navigation__link" href="index.php?page=cart"><img src="../assets/img/cart.svg " alt="een foto van de cart"></a>
    </nav>
    <div class="navigation__wrapper">
    </div>
    <?php if (!empty($_SESSION['info'])){
        if($_GET['page'] == 'detail' || $_GET['page'] == 'abonnement') {?>
          <div class="info__order--wrapper">
            <picture>
              <source media="(min-width: 1325px)"  srcset="./assets/img/shop/bedankt/bedankt3x.jpg">
              <source media="(min-width: 700px)"  srcset="./assets/img/shop/bedankt/bedankt2x.jpg">
              <source media="(min-width: 0px)"  srcset="./assets/img/shop/bedankt/bedankt1x.jpg">
              <img class="pic-info" src="./assets/img/shop/bedankt/bedankt1x.jpg" alt="Bedankt voor de aankoop!">
            </picture>
            <p class="info__order--text">Bedankt <?php if(!empty($_product['product'])){ echo $product['product'];} else { echo 'om dit product'; } ?> te kopen</p>
            <div class="info__order--links">
              <a class="info__order--shop" href="index.php?">Verder shoppen</a>
              <a class="info__order--cart" href="index.php?page=cart">Naar winkelmandje</a>
            </div>
          </div>
        <?php } else { ?>
        <div class="info__wrapper">
          <p class="info"><?php echo $_SESSION['info']; ?></p>
        </p>
        <?php }
      } ?>
    <?php echo $content;?>
    <!-- style="
    display: none;" -->
    <footer class="footer<?php if($_GET['page'] == 'cart') { echo '--hidden';} ?>" <?php if($_GET['page'] == 'cart') { echo 'style="
    display: none;"';} ?>>
      <a class="footer__abonnement" href="index.php?page=abonnement">Neem een Abonnement</a>
      <ul class="footer__items">
        <li class="footer__item"><a class="footer__link" href="">Home</a></li>
        <li class="footer__item"><a class="footer__link" href="">colofon</a></li>
        <li class="footer__item"><a class="footer__link" href="">cookies</a></li>
        <li class="footer__item"><a class="footer__link" href="">webshop</a></li>
      </ul>
    </footer>
      <?php echo $js; ?>
  </body>
</html>
