<a class="goback" href="index.php?page=cart">Terug</a>
<article class="persoonlijk">
    <h2 class="hidden">Persoonlijk</h2>
  <div class="persoonlijk__steps">
    <p class="steps__after steps__after--active">persoonlijk</p><span>&#10132;</span>
    <p class="steps__after">Levering</p><span>&#10132;</span>
    <p class="steps__after">Betaalwijze</p><span>&#10132;</span>
    <p >Betalen</p>
  </div>
  <div class="persoonlijk__cart">
    <p class="persoonlijk__cart--text">Herbekijk bestelling</p>
  </div>
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
    <div class="form__button--wrapper">
      <button name="action" value="submit" type="submit" class="form__button button__margin">Naar Levering</button>
      <!-- <a class="form__button button__margin" href="index.php?page=levering">Naar Levering</a> -->
    </div>
  </form>
</article>
