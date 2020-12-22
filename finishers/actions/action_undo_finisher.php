<?php
  include_once('../database/db_class.php');
  include_once('../database/finishers.php');

  decrement('Frankie');
  header('Location: ../index.php');
?>