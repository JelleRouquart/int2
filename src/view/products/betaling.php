<a class="goback" href="index.php?page=persoonlijk">Terug</a>
<article class="persoonlijk persoonlijk-betaling">
  <?php $total = 0; ?>
  <h2 class="hidden">Levering</h2>
  <div class="persoonlijk__steps">
    <p class="steps__after">persoonlijk</p><span>&#10132;</span>
    <p class="steps__after">Levering</p><span>&#10132;</span>
    <p class="steps__after steps__after--active">Betaalwijze</p><span>&#10132;</span>
    <p >Betalen</p>
  </div>
  <div class="persoonlijk__cart">
  <input class="cart__input--check" id="cart-checkbox" type="checkbox">
  <label class="persoonlijk__cart--text" for="cart-checkbox"><span class="text-wrapper-check">Herbekijk bestelling</span>
    <?php if(!empty($_SESSION['cart'])){ ?>
      <ul class="carten">
        <?php if(!empty($_SESSION['cart'])){ ?>
          <?php foreach ($_SESSION['cart'] as $cart) { ?>
            <?php
            $itemTotal = $cart['product']['prijs'] * $cart['quantity'];
            $total += $itemTotal;
            ?>
            <li class="cart__item">
              <div class="cart__image">
                <source media="(min-width: 0px)" srcset="./assets/img/shop/home/2/<?php echo $cart['product']['image_id']; ?>0.5x.jpg">
                <img class="pic-random" src="./assets/img/shop/home/2/<?php echo $cart['product']['image_id']; ?>0.5x.jpg" alt="dit is het artiekel: <?php echo $cart['product']['description']; ?>">
              </div>
              <a class="cart__product cart__product--checkout" href="index.php?page=detail&amp;id=<?php echo $cart['product']['id']; ?>"><?php echo $cart['product']['product'] ?></a>
              <input required class="cart__quantity" type="text"
              name="quantity[<?php echo $cart['product']['id']; ?>]"
              value="<?php echo $cart['quantity'] ?>"
              >
              <p class="cart__prijs">€<?php echo $cart['product']['prijs'] * $cart['quantity'];?></p>
            </li>
            <?php } ?>
          <?php } ?>
        <?php } ?>
        <li class='order-total'><span>total:</span> <?php echo $total;?></li>
      </ul>
  </div>
  </label>
  <form class="betaling__form" action="index.php?page=betaling" method="POST">
  <div class="betaling__font--wrapper">
    <p class="betaling__font">Kies welke optie je jou bestelling wilt afronden:</p>
  </div>
   <div class="levering__options">
     <input checked id="radio__betaling--one" class="radio__betaling--select hidden" type="radio" name="betaling" value="Bankcontact">
     <label for="radio__betaling--one" class="levering__option">
      Bankcontact
      </label>
      <input id="radio__betaling--two" class="radio__betaling--select hidden" type="radio" name="betaling" value="Payconic">
      <label for="radio__betaling--two" class="levering__option">
      Payconic
      </label>
      <input id="radio__betaling--three" class="radio__betaling--select hidden" type="radio" name="betaling" value="Visa">
      <label for="radio__betaling--three" class="levering__option">
      Visa
      </label>
      <input id="radio__betaling--four" class="radio__betaling--select hidden" type="radio" name="betaling" value="PayPall">
      <label for="radio__betaling--four" class="levering__option">
      PayPall
      </label>
  </div>
  <div class="form__button--betalen">
    <!-- <button class="form__button button__margin">Betalen</button> -->
    <button name="action" value="submit" type="submit" class="form__button button__margin">betalen</button>
  </div>
  </form>
</article>
