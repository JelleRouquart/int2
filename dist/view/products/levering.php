<a class="goback" href="index.php?page=persoonlijk">Terug</a>
<article class="persoonlijk">
  <h2 class="hidden">Levering</h2>
  <div class="persoonlijk__steps">
    <p class="steps__after">persoonlijk</p><span>&#10132;</span>
    <p class="steps__after steps__after--active">Levering</p><span>&#10132;</span>
    <p class="steps__after">Betaalwijze</p><span>&#10132;</span>
    <p >Betalen</p>
  </div>
  <div class="persoonlijk__cart">
    <p class="persoonlijk__cart--text">Herbekijk bestelling</p>
  </div>
  <div class="levering__options">
     <label class="levering__option levering__option--selected">
      <input class="hidden" type="radio" name="group1" value="thuis">
      Lever adres
      </label>
      <label class="levering__option">
      <input class="hidden" type="radio" name="group1" value="bpost">
      G-Post office
      </label>
  </div>
  <form action="index.php?page=levering" method="POST">
    <div class="keuze">
      <label class="thuisadres-text">
        <span class="checkmark"></span> <input name="same" class="thuisadres-input" type="checkbox">hetzelfde als thuis adres?
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
            <input name="postcode" class="form__input form__input--small" type="text" >
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

      <div class="form__button--wrapper">
        <button name="action" value="submit" type="submit" class="form__button button__margin">Naar Betaling</button>
        <!-- <a class="form__button button__margin" href="index.php?page=betaling">Naar Betaling</a> -->
      </div>
  </form>
</article>
