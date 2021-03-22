<?php require '../templates/head.html' ?>
<?php session_start(); ?>

<header>
  <h1>Sir <b>Inspector BeQuiet</b></h1>
</header>

<body>
  <?php require '../database/finishers.php' ?>
  <?php 
    if(isset($_SESSION['allow-levels']) && $_SESSION['allow-levels'] == true) { ?>
      <div><p id="counter">#<?= $entries["levels"] ?></p><br><br>
        <form method="post" action="../actions/action_finisher.php">
          <input type="hidden" name="player_name" value="levels">
          <input id="apply" type="submit" value="Finisher">
        </form>

        <form method="post" action="../actions/action_undo_finisher.php">
          <input type="hidden" name="player_name" value="levels">
          <input id="undo" type="submit" value="Undo">
        </form> 
      </div> <?php 
    }

    else { ?>
      <div><p id="counter">#<?= $entries["levels"] ?></p><br><br>
        <form method="post" action="../actions/action_protect.php">
          <input id="password" type="text" placeholder="Password..." name="p">
          <input id="validate" type="submit" value="Validate">
          <br>
          <section class="lowkey">
            <label for="hide-psw">Hide password </label>
            <input style="display: none;" id="hide-psw" type="checkbox" onclick="togglePassword(); toggleAppearance();">
          </section>
        </form> 
      </div> <?php 
    } 
  ?>

</body>
</html>