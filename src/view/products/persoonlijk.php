<a class="goback" href="index.php?page=cart">Terug</a>
<article class="persoonlijk">
  <?php $total = 0; ?>
    <h2 class="hidden">Persoonlijk</h2>
  <div class="persoonlijk__steps">
    <p class="steps__after steps__after--active">persoonlijk</p><span>&#10132;</span>
    <p class="steps__after">Levering</p><span>&#10132;</span>
    <p class="steps__after">Betaalwijze</p><span>&#10132;</span>
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
  <form action="index.php?page=persoonlijk" method="POST" class="form__persoonlijk">
    <div class="persoonlijk__form">
      <label class="form__label">Naam:
        <input name="naam" class="form__input persoonlijk__input" type="text" required >
      </label>
      <label class="form__label">Achternaam:
        <input name="achternaam" class="form__input persoonlijk__input" type="text" required >
      </label>
      <label class="form__label">E-mailadres:
        <input name="email" class="form__input" type="text" required >
      </label>
    </div>
    <div class="persoonlijk__formtwo">
      <label class="form__label">Straat:
        <input name="straat" class="form__input" type="text" required >
      </label>
      <div class="persoonlijk__formThree">
        <label class="form__label form__label--place">Postcode
          <input name="postcode" class="form__input form__input--small" type="text" required >
        </label>
        <label class="form__label form__label--place">Nr
          <input name="nr" class="form__input form__input--small" type="text" required >
        </label>
        <label class="form__label form__label--place">bus
          <input name="bus" class="form__input form__input--small" type="text" >
        </label>
      </div>
    </div>
    <div class="form__button--levering">
      <button name="action" value="submit" type="submit" class="form__button button__margin--persoonlijk">Naar Levering</button>
      <!-- <a class="form__button button__margin" href="index.php?page=levering">Naar Levering</a> -->
    </div>
  </form>
</article>
