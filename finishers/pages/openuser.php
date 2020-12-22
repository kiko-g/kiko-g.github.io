<?php require '../templates/head.html' ?>
<?php 
  session_start();
?>

<header>
  <h1><b>Non protected user</b></h1>
</header>

<body>
  <?php require '../database/finishers.php' ?>
  <div> <p id="counter">#<?= $entries["OpenUser"] ?></p> </div>

  <form method="post" action="../actions/action_finisher.php">
    <input type="hidden" name="player_name" value="OpenUser">
    <input id="apply" type="submit" value="Finisher">
  </form>

  <form method="post" action="../actions/action_undo_finisher.php">
    <input type="hidden" name="player_name" value="OpenUser">
    <input id="undo" type="submit" value="Undo">
  </form>

</body>
</html>