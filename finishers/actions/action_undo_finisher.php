<?php
  include_once('../database/db_class.php');
  include_once('../database/finishers.php');

  decrement($_POST['player_name']);
  header('Location: ../pages/' . $_POST['player_name'] . '.php');
?>