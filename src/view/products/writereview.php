<a class="goback" href="index.php?page=reviews&amp;id=<?php echo $_GET['id']; ?>">Terug</a>
<article class="writerev">
  <h2 class="hidden">Schrijf je eigen review</h2>
  <form class="form__review" action="index.php?page=writereview&amp;id=<?php echo $_GET['id']; ?>" method="POST">
    <input  type="hidden" name="action" value="submitform">
    <div class="writerev__first">
      <label class="form__label">Naam:<input name="name" class="form__input" type="text" required ></label>
      <label class="form__label">Achternaam:<input name="lastname" class="form__input" type="text" required ></label>
    </div>
    <label class="form__label">E-mail:<input name="email" class="form__input" type="email" required ></label>
    <div class="form__stars--wrapper">
      <div class="form__stars">
        <label class="form__label">Rating</label>
          <div class=" rate">
            <input type="radio" id="star1" name="rate" value="1" />
            <label for="star1" title="text"></label>
            <input type="radio" id="star2" name="rate" value="2" />
            <label for="star2" title="text"></label>
            <input type="radio" id="star3" name="rate" value="3" />
            <label for="star3" title="text"></label>
            <input type="radio" id="star4" name="rate" value="4" />
            <label for="star4" title="text"></label>
            <input type="radio" id="star5" name="rate" value="5" />
            <label for="star5" title="text"></label>
          </div>
      </div>
    </div>
    <label class="form__label">Bericht<textarea name="description" class="form__input form__input--textarea" cols="40" rows="5" required ></textarea></label>
    <div class="form__button--wrapper">
      <button type="submit" value="submitform" class="form__button">Publiceer</button>
    </div>

  </form>
</article>
