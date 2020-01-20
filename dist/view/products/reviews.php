<a class="goback" href="index.php?page=detail&amp;id=<?php echo $_GET['id']; ?>">Terug</a>
<h2 class="detailproduct__title">Reviews</h2>
<div class="detailproduct__button--wrapper revieuw__button">
  <a class="detailproduct__button" href="index.php?page=writereview&amp;id=<?php echo $_GET['id']; ?>">Schrijf zelf je review</a>
</div>
<article class="">
  <ul class="detailproduct__revieuws--wrapper">
<?php foreach($reviews as $review): ?>
  <li class="detailproduct__revieuws extra-padding detailproduct__revieuws--wrapper--self">
    <?php if (!empty($review)) { ?>
      <h3 class="hidden">reviews</h3>
      <div class="detailproduct__stars">
      <?php if ($review['stars'] == 1){ ?>
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
      <?php }else if ($review['stars'] == 2){ ?>
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
      <?php } else if ($review['stars'] == 3){ ?>
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
      <?php } else if ($review['stars'] == 4){ ?>
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/nostar.svg" alt="geen ster">
      <?php } else if ($review['stars'] == 5){?>
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
        <img src="./assets/img/fullstar.svg" alt="een volle ster">
      <?php } ?>
      </div>
      <p class="detailproduct__revieuw--description"><span class="detailproduct__quote">"</span><?php echo $review['description'] ?><span class="detailproduct__quote">"</span></p>
      <p class="revieuw__persoon">Door <?php echo $review['naam'] ?></p>
    <?php } else { ?>
      <p class="detailproduct__revieuw--description marker">Er zijn zijn nog geen revieuws voor dit artikel, wil jij de eerste zijn?</span></p>
      <img class="revieuw__foto" src="./assets/img/jammer.jpg" alt="er zijn geen revieuws: foto van jeroom">
      <a class="revieuw__link revieuw__second--link" href="index.php?page=writereviews&amp;id=<?php echo $product['id']; ?>">schrijf je eigen revieuw >></a>
    <?php } ?>
  </li>
  <!-- <div class="review__background"></div> -->
<?php endforeach; ?>
</ul>
</article>
