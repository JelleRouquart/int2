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
          <img src="" alt="">
        </div>
       <div class="abonnementpage__wrapper">
          <p class="abonnementpage__title"><?php echo $abonnement['maand'] ?> maand:</p>
          <p class="abonnementpage__price"><?php echo $abonnement['prijs'] ?> euro/maand</p>
          <button class="abonnementpage__button">Bestel</button>
       </div>
      </li>
    <?php endforeach; ?>
  </ul>
</section>
