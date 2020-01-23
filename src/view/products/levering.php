<div class="goback__wrapper"><a class="goback" href="index.php?">Terug</a></div>
<article class="persoonlijk persoonlijk-levering">
  <?php $total = 0; ?>
  <h2 class="hidden">Levering</h2>
  <div class="persoonlijk__steps">
    <p class="steps__after">persoonlijk</p><span>&#10132;</span>
    <p class="steps__after steps__after--active">Levering</p><span>&#10132;</span>
    <p class="steps__after">Betaalwijze</p><span>&#10132;</span>
    <p >Betalen</p>
  </div>
  <div class="persoonlijk__cart">
  <input class="cart__input--check" id="cart-checkbox" type="checkbox">
  <label class="persoonlijk__cart--text" for="cart-checkbox"><span class="text-wrapper-check">Herbekijk bestelling</span></label>
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
        <li class='order-total order-total-checkout'><span>total:</span> <?php echo $total;?></li>
      </ul>
  </div>
  <div class="levering__options">
     <label class="levering__option levering__option--selected">
      <input class="hidden" type="radio" name="group1" value="thuis">
      Leveradres
      </label>
      <label class="levering__option levering__option--grid">
      <input class="hidden" type="radio" name="group1" value="bpost">
      G-Post office
      </label>
  </div>
  <form class="levering__form" action="index.php?page=levering" method="POST">
    <input id="checkbox-levering" name="same" class="thuisadres-input" type="checkbox">
    <div class="keuze">
      <label for="checkbox-levering" class="thuisadres-text">
        <span class="checkmark"></span>
        zelfde als thuisadres
      </label>
      <div class="keuze-wrapper">
        <p><?php echo $_SESSION['user']['thuisadres']['straat'] ?>, <span><?php echo $_SESSION['user']['thuisadres']['nr'] ?></span></p>
        <p><?php echo $_SESSION['user']['thuisadres']['postcode'] ?></p>
        <p><?php echo $_SESSION['user']['thuisadres']['bus'] ?></p>
      </div>
    </div>
    <div class="persoonlijk__formtwo">
        <label class="form__label">Straat:
          <input name="straat" class="form__input" type="text" >
        </label>
        <div class="persoonlijk__formThree">
          <label class="form__label form__label--place">Postcode
            <input minlength="4" name="postcode" class="form__input form__input--small" type="text" >
          </label>
          <label class="form__label form__label--place">Nr
            <input name="nr" class="form__input form__input--small" type="text" >
          </label>
          <label class="form__label form__label--place">bus
            <input name="bus" class="form__input form__input--small" type="text" >
          </label>
        </div>
      </div>

      <input type="hidden" name="straathide" value="<?php echo $_SESSION['user']['thuisadres']['straat'] ?>">
      <input type="hidden" name="nrhide" value="<?php echo $_SESSION['user']['thuisadres']['nr'] ?>">
      <input type="hidden" name="postcodehide" value="<?php echo $_SESSION['user']['thuisadres']['postcode'] ?>">
      <input type="hidden" name="bushide" value="<?php echo $_SESSION['user']['thuisadres']['bus'] ?>">

      <div class="form__button--wrapper form__button--">
        <button name="action" value="submit" type="submit" class="form__button button__margin">Naar Betaling</button>
        <!-- <a class="form__button button__margin" href="index.php?page=betaling">Naar Betaling</a> -->
      </div>
  </form>
</article>
