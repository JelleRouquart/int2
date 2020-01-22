<section class="abonnementen">
  <h2 class="detailproduct__title detailproduct__title--smaller">Papier en digitaal abonnement!</h2>
  <div class="abonnementen__uitleg">
    <p class="abonnementen__text">Met het abonnement van humo kan u 1x per week het magazine toegestuurd krijgen en ons mobiel magazine lezen</p>
    <p class="abonnementen__text">Ook kan u online op onze sit alle artikels voledig lezen!</p>
  </div>
  <ul class="abonnemneten__wrapper">
    <?php foreach($abonnements as $abonnement): ?>
      <li class="abonnementpage">
        <div class="abonnement__img">
          <picture>
            <source media="(min-width: 1000px)"  srcset="./assets/img/shop/abonnement/big/<?php echo $abonnement['id']; ?>.jpg">
            <source media="(min-width: 700px)"  srcset="./assets/img/shop/abonnement/medium/<?php echo $abonnement['id']; ?>.jpg">
            <source media="(min-width: 0px)"  srcset="./assets/img/shop/abonnement/small/<?php echo $abonnement['id']; ?>.jpg">
            <img class="pic-abonnement" src="./assets/img/shop/abonnement/medium/<?php echo $abonnement['id']; ?>.jpg" alt="dit is het artiekel: <?php echo $abonnement['product'] ?>">
          </picture>
        </div>
       <div class="abonnementpage__wrapper">
          <p class="abonnementpage__title"><?php echo $abonnement['name'] ?> maand:</p>
          <p class="abonnementpage__price"><?php echo $abonnement['prijs'] ?> euro/maand</p>
          <form action="index.php?page=abonnement" method="POST">
            <input type="hidden" name="price" value="<?php echo $abonnement['id'] ?>">
            <button type="submit" name="action" value="submitform" class="abonnementpage__button">Bestel</button>
          </form>
       </div>
      </li>
    <?php endforeach; ?>
  </ul>
</section>
