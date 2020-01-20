<a class="goback" href="index.php?">Terug</a>
<form action="index.php?page=cart" method="POST">
<?php $total = 0; ?>
<article class="cart">
  <h2 class="detailproduct__title cart__border">Cart</h2>
  <?php if(!empty($_SESSION['cart'])){ ?>
  <ul class="carten">
    <?php if(!empty($_SESSION['cart'])){ ?>
  <?php foreach ($_SESSION['cart'] as $cart) { ?>
      <?php
    $itemTotal = $cart['product']['prijs'] * $cart['quantity'];
    $total += $itemTotal;
  ?>
    <li class="cart__item">
      <div class="cart__image"></div>
      <a class="cart__product" href="index.php?page=detail&amp;id=<?php echo $cart['product']['id']; ?>"><?php echo $cart['product']['product'] ?></a>
      <input required class="cart__quantity" type="text"
      name="quantity[<?php echo $cart['product']['id']; ?>]"
      value="<?php echo $cart['quantity'] ?>"
      >
      <p class="cart__prijs">€<?php echo money_format("%i", $cart['product']['prijs'] * $cart['quantity']);?></p>
      <button type="submit" name="remove" value="<?php echo $cart['product']['id'];?>" class="cart__delete" >&#215;</button>
    </li>
    <?php } ?>
<?php } ?>
  </ul>
  </div>
<div class="cart__flex--wrapper">
  <p class='order-total'><span>total:</span> <?php echo money_format("%i", $total);?></p>
  <div class="cart__button--wrapper">
    <div class="form__button--wrapper">
      <button type="submit" name="action" value="update" class="form__button cart__hole">Update</button>
    </div>
    <div class="form__button--wrapper cart__button">
      <!-- <button type="submit" name="action" value="submitform" class="form__button">checkout</button> -->
      <a class="form__button" href="index.php?page=persoonlijk">Checkout</a>
    </div>
  </div>
</div>
  <?php }else { ?>

  <div class="nothing">
    <p class="nothing__text">Er zit niks in je winkelmandje, </p>
    <img class="nothing__img" src="./assets/img/cartempty.jpg" alt="foto van Jeroom">
  </div>
  <?php } ?>
</article>
</form>
