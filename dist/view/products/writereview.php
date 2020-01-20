<a class="goback" href="index.php?page=reviews&amp;id=<?php echo $_GET['id']; ?>">Terug</a>
<article class="writerev">
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
          <div>
            <input type="radio" name="stars" value="1">
            <input type="radio" name="stars" value="2">
            <input type="radio" name="stars" value="3">
            <input type="radio" name="stars" value="4">
            <input type="radio" name="stars" value="5">
          </div>
      </div>
    </div>
    <label class="form__label">Bericht<textarea name="description" class="form__input form__input--textarea" name="Text1" cols="40" rows="5" required ></textarea></label>
    <div class="form__button--wrapper">
      <button type="submit" value="submitform" class="form__button">Publiceer</button>
    </div>

  </form>
</article>
