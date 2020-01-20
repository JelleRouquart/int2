<a class="goback" href="index.php?">Terug</a>
<?php if(!empty($_SESSION['info'])) { ?>
<div class="thanks">
  <img class="thanks__img" src="./assets/img/bedankt.jpg" alt="bedankt van Jeroom">
  <p>Bedankt om de bladwijzer te kopen!</p>
  <div class="thanks__wrapper">
    <a class="thanks__link thanks__link--yello" href="index.php?page=home">Verder shoppen</a>
    <a class="thanks__link" href="index.php?page=cart">Naar winkelmandje</a>
  </div>
</div>
<?php } ?>
<section class="detailproduct">
  <header class="deatil__header">
    <h2 class="detailproduct__title"><?php echo $product['product'] ?></h2>
    <!-- <div class="slide-container">
      <span id="slider-image-one"></span>
      <span id="slider-image-two"></span>
      <span id="slider-image-three"></span> -->
      <!-- <div class="image-container">
        <img class="slider-image" width="340px" src="../assets/img/slider/one.jpg" alt="">
        <img class="slider-image" width="340px" src="../assets/img/slider/two.jpg" alt="">
        <img class="slider-image" width="340px" src="../assets/img/slider/three.jpg" alt="">
      </div>
      <div class="button-container">
        <a href="#slider-image-one" class="slider-button">1</a>
        <a href="#slider-image-two" class="slider-button">2</a>
        <a href="#slider-image-three" class="slider-button">3</a>
      </div> -->
      <!-- <input type="radio"> -->
    </div>
  </header>
  <div class="detailproduct__img--wrapper">
    <div class="detailproduct__img">
      <?php foreach ($photos as $photo){ ?>
        <picture>
        <source media="(min-width: 0px)"  srcset="./assets/img/shop/<?php echo $product['id']; ?>/1/<?php echo $photo['nr']; ?>1x.jpg">
        <img class="pic-detail" src="./assets/img/shop/<?php echo $product['id']; ?>/1/11x.jpg" alt="dit is het artiekel: <?php echo $product['product'] ?>">
      </picture>
      <?php } ?>
      </div>
  </div>
  <!-- <article class="detailproduct__specs"> -->
    <h3 class="hidden">Specs</h2>
    <form method="POST" action="index.php?page=detail&amp;id=<?php echo $product['id']; ?>" class="detailproduct__button--wrapper">
      <input  type="hidden" name="action" value="submitform">
      <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
      <button type="submit" value="submitform" class="detailproduct__button">Plaats in winkelmandje</button>
    </form>
    <div class="product__price">
      <p class="detailproduct__price">€<?php echo $product['prijs'] ?></p>
      <p class="product__price--text">direct leverbaar</p>
    </div>
    <p class="detailproduct__description"><?php echo $product['description'] ?></p>
  <!-- </article> -->
  <article class="detailproduct__revieuws">
    <?php if (!empty($revieuw)) { ?>
      <h3 class="hidden">revieuws</h3>
      <div class="detailproduct__stars">
      <?php if ($revieuw['stars'] == 1){ ?>
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
      <?php }else if ($revieuw['stars'] == 2){ ?>
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
      <?php } else if ($revieuw['stars'] == 3){ ?>
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
      <?php } else if ($revieuw['stars'] == 4){ ?>
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
      <?php } else if ($revieuw['stars'] == 5){?>
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
      <?php } ?>
      </div>
      <p class="detailproduct__revieuw--description"><span class="detailproduct__quote">"</span><?php echo $revieuw['description'] ?><span class="detailproduct__quote">"</span></p>
      <p class="revieuw__persoon">Door <?php echo $revieuw['naam'] ?></p>
      <a class="revieuw__link" href="index.php?page=reviews&amp;id=<?php echo $product['id']; ?>">Bekijk alle reviews >></a>
    <?php } else { ?>
      <p class="detailproduct__revieuw--description marker">Er zijn zijn nog geen revieuws voor dit artikel, wil jij de eerste zijn?</span></p>
      <img class="revieuw__foto" src="./assets/img/jammer.jpg" alt="er zijn geen revieuws: foto van jeroom">
      <a class="revieuw__link revieuw__second--link" href="index.php?page=reviews&amp;id=<?php echo $product['id']; ?>">schrijf je eigen revieuw >></a>
    <?php } ?>
  </article>
  <article class="productspecs">
    <h3 class="productspecs__title">Productspecificaties</h3>
    <ul>
      <?php foreach ($specs as $spec): ?>
        <li class="productspecs__text"><?php echo $spec['spec'] ?></li>
      <?php endforeach; ?>
    </ul>
  </article>
  <aside class="randoms">
    <h3  class="productspecs__title">U bent wellicht ook geïntresseerd in:</h3>
    <ul>
      <?php foreach ($randoms as $random): ?>
        <li>
          <a class="random"  href="index.php?page=detail&amp;id=<?php echo $random['id']; ?>">
            <div class="random__img"></div>
            <p class="random__title"><?php echo $random['product'] ?></p>
            <p class="random__after">&#10132;</p>
          </a>
        </li>

      <?php endforeach ?>
    </ul>

  </aside>

</section>

