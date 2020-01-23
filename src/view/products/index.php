<section class="abonnement">
  <h2 class="abonnement__title">koop een abonnement <span class="abonnement__title--marker">€15,95</span> papier + digitaal</h2>
  <a class="abonnement__button" href="index.php?page=abonnement">Meer info</a>
</section>
<aside class="filter">
  <input class="filtered" id="filter" type="checkbox"/>
  <label class="filter__label" for="filter"><span class="filter__label--display">Filters</span></label>
      <form class="filter__form" action="index.php?" method="GET">
        <div class="filter___none">
          <input class="filter__form--checkbox" id="1" type="radio" name="filter" <?php if(!empty($_GET['filter'])){if($_GET['filter'] == 'alles'){ echo 'checked'; }} ?> value="alles"><label class="filter__form--label" for="1">Alles</label>
          <input class="filter__form--checkbox" id="2" type="radio" name="filter" <?php if(!empty($_GET['filter'])){if($_GET['filter'] == 'special'){ echo 'checked'; }} ?> value="special"><label class="filter__form--label" for="2">Humo's specials</label>
          <input class="filter__form--checkbox" id="3" type="radio" name="filter" <?php if(!empty($_GET['filter'])){if($_GET['filter'] == 'licht'){ echo 'checked'; }} ?> value="licht"><label class="filter__form--label" for="3">Lees lichten</label>
          <input class="filter__form--checkbox" id="4" type="radio" name="filter" <?php if(!empty($_GET['filter'])){if($_GET['filter'] == 'ereader'){ echo 'checked'; }} ?> value="ereader"><label class="filter__form--label" for="4">E-readers</label>
          <input class="filter__form--checkbox" id="5" type="radio" name="filter" <?php if(!empty($_GET['filter'])){if($_GET['filter'] == 'vergrootglas'){ echo 'checked'; }} ?> value="vergrootglas"><label class="filter__form--label" for="5">vergrootglas</label>
          <input class="filter__form--checkbox" id="6" type="radio" name="filter" <?php if(!empty($_GET['filter'])){if($_GET['filter'] == 'boeken'){ echo 'checked'; }} ?> value="boeken"><label class="filter__form--label" for="6">boeken</label>
          <input type="hidden" name="action" value="filter">
          <button  class="filter__form--label filter-button">Filter</button>
        </div>
      </form>
</aside>
<section class="products">
  <h2 class="subtitle">Products</h2>
  <ul class="products__wrapper">
    <?php foreach ($products as $product): ?>
      <li class="product">
        <div class="img">
          <picture class="pic">
            <source media="(min-width: 700px)" srcset="./assets/img/shop/home/3/<?php echo $product['id']; ?>1x.jpg">
            <source media="(min-width: 0px)" srcset="./assets/img/shop/home/2/<?php echo $product['id']; ?>0.5x.jpg">
            <img class="pic" src="assets/img/hummus-long.jpg" alt="dit is het artiekel: <?php echo $product['product'] ?>">
          </picture>
          <!-- <img class="img__wraped" height="151" src="./assets/img/shop/home/2/<?php echo $product['id']; ?>0.5x.jpg" alt=""> -->
        </div>
        <div class="product__text">
          <p class="product__title"><?php echo $product['product']; ?></p>
          <p class="product__price--two">€<?php echo $product['prijs']; ?></p>
          <div class="product__button--wrapper">
            <a class="product__button" href="index.php?page=detail&amp;id=<?php echo $product['id']; ?>">Meer info</a>
          </div>
        </div>
      </li>
      <li class=product__background></li>
    <?php endforeach; ?>
  </ul>
</section>
