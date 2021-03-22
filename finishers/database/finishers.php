<?php
  require_once("../database/db_class.php");
  $dbc = Database::instance()->db();

  $execute_array = array();
  $stmt = $dbc->prepare('SELECT * FROM finishers');
  $stmt->execute($execute_array);
  $finishers = $stmt->fetchAll();
  
  $entries = array();
  foreach ($finishers as $index => $entry) {
    $entries[$entry["player_name"]] = (int)$entry["finisher_count"];
  }

  function increment($player_name) {
    $dbc = Database::instance()->db();
    $statement = $dbc->prepare('UPDATE finishers SET finisher_count = finisher_count + 1 WHERE player_name = ?');
    $statement->execute(array($player_name));
  }

  function decrement($player_name) {
    $dbc = Database::instance()->db();
    $statement = $dbc->prepare('UPDATE finishers SET finisher_count = finisher_count - 1 WHERE player_name = ?');
    $statement->execute(array($player_name));
  }    
?>