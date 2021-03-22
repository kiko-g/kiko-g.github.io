<?php require '../templates/head.html';

  $password = $_POST['p'];

  if($password === 'scumbagkiko') {
    session_start();
    $_SESSION['allow-frankie'] = true;
    header('Location: ../pages/frankie.php');
  }

  if($password === 'bequiet') {
    session_start();
    $_SESSION['allow-levels'] = true;
    header('Location: ../pages/levels.php');
  }  

  else {
    echo "<div><p>Wrong Password</p><br><br> Your input: <code>" . ($password) . "</code></div>";
  }
?>