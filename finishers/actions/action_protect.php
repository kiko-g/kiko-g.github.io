<?php require '../templates/head.html';

  $password = $_POST['p'];

  if($password === 'canhola') {
    session_start();
    $_SESSION['allow'] = true;
    header('Location: ../index.php');
  }

  else {
    echo "<div><p>Wrong Password</p><br><br> Your input: <code>" . ($password) . "</code></div>";
  }
?>