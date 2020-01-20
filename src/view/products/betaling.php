<a class="goback" href="index.php?page=persoonlijk">Terug</a>
<article class="persoonlijk">
  <h2 class="hidden">Levering</h2>
  <div class="persoonlijk__steps">
    <p class="steps__after">persoonlijk</p><span>&#10132;</span>
    <p class="steps__after">Levering</p><span>&#10132;</span>
    <p class="steps__after steps__after--active">Betaalwijze</p><span>&#10132;</span>
    <p >Betalen</p>
  </div>
  <div class="persoonlijk__cart">
    <p class="persoonlijk__cart--text">Herbekijk bestelling</p>
  </div>
  <div>
    <p class="betaling__font">Kies welke optie je jou bestelling wilt afronden:</p>
  </div>
  <form action="index.php?page=betaling" method="POST">
   <div class="levering__options">
     <label class="levering__option levering__option--selected">
      <input class="hidden" type="radio" name="betaling" value="Bankcontact">
      Bankcontact
      </label>
      <label class="levering__option">
      <input class="hidden" type="radio" name="betaling" value="Payconic">
      Payconic
      </label>
      <label class="levering__option">
      <input class="hidden" type="radio" name="betaling" value="Visa">
      Visa
      </label>
      <label class="levering__option">
      <input class="hidden" type="radio" name="betaling" value="PayPall">
      PayPall
      </label>
  </div>
  <div class="form__button--wrapper">
    <!-- <button class="form__button button__margin">Betalen</button> -->
    <button name="action" value="submit" type="submit" class="form__button button__margin">betalen</button>
  </div>
  </form>
</article>
