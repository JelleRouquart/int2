<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Humo - <?php echo $title; ?></title>
    <link href="//db.onlinewebfonts.com/c/10ed9a0ae6e4b2e5c13c438cdd266b6f?family=News+Gothic+BT" rel="stylesheet" type="text/css"/>
    <link href="//db.onlinewebfonts.com/c/28ce029aa488ec6feda976ca3e33ccb5?family=Swis721+Cn+BT" rel="stylesheet" type="text/css"/>
    <link href="//db.onlinewebfonts.com/c/a068eccac9762e15c1a5256f39b47f01?family=NewsGothicW07-Regular" rel="stylesheet" type="text/css"/>
    <link href="//db.onlinewebfonts.com/c/af3c23af4832283306943af2f3239f01?family=NewsGothicW07-Bold" rel="stylesheet" type="text/css"/>
    <?php echo $css;?>
  </head>
  <body>
    <nav class="navigation">
      <img src="../assets/img/nav.svg " alt="een foto van de navigatie">
      <a class="link" href="index.php?page=home"><h1 class="title">Humo</h1></a>
      <a href="index.php?page=cart"><img src="../assets/img/cart.svg " alt="een foto van de cart"></a>
    </nav>
    <div class="info__wrapper">
      <?php if (!empty($_SESSION['info'])){?>
      <p class="info">
        <!-- hallo ik ben klein fuckers -->
        <?php echo $_SESSION['info']; ?>
      </p>
      <?php } ?>
    </div>
    <?php echo $content;?>
    <?php echo $js; ?>
  </body>
</html>
