<?php require '../templates/head.html' ?>
<?php 
  session_start();
?>


<header>
  <h1>Sir <b>Inspector BeQuiet</b></h1>
</header>

<body>
  <?php require '../database/finishers.php' ?>
  <div> <p id="counter">#<?= $entries["Levels"] ?></p> </div>
  <?php 
    if(isset($_SESSION['allow-levels']) && $_SESSION['allow-levels'] == true) { ?>
      <form method="post" action="../actions/action_finisher.php">
        <input type="hidden" name="player_name" value="Levels">
        <input id="apply" type="submit" value="Finisher">
      </form>

      <form method="post" action="../actions/action_undo_finisher.php">
        <input type="hidden" name="player_name" value="Levels">
        <input id="undo" type="submit" value="Undo">
      </form>
      
      <?php 
    } 

    else { ?>
      <form method="post" action="../actions/action_protect.php">
        <input type="password" placeholder="Password" name="p">
        <input type="submit" value="Validate">
      </form> <?php 
    }
  ?>


</body>

</html>