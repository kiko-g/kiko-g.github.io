<?php require '../templates/head.html' ?>

<header>
  <h1>Sir <b>Scumbag_Kiko</b></h1>
</header>

<body>
  <?php require '../database/finishers.php' ?>
  <div> <p id="counter"><?= $entries["Frankie"] ?></p> </div>
  <form method="post" action="../actions/action_finisher.php">
    <input type="submit" value="Finisher">
  </form>
</body>

</html>