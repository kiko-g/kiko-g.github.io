<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Wrong Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Scripts -->

  <!-- Style -->
  <link rel="stylesheet" href="style/style.css">

  <!-- Favicon -->
  <link href="../../assets/img/favicon.png" rel="icon">
</head>

<?php
  $password = $_POST['p'];

  if($password === 'canhola') {
    session_start();
    $_SESSION['allow'] = true;
    header('Location: ../index.php');
  }

  else {
    echo "<div><p>Wrong Password: '" . ($password) . "' </p></div>";
  }

  
?>