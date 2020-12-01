<!DOCTYPE html>
<html>
  <head>
    <title>Sum Two Numbers</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
  </head>
  <body>
  <?php
    $x = $_GET['x'];
    $y = $_GET['y'];

    echo "<h1>" . ($x + $y) . "</h1>";
  ?>

  <form action="index.php"> <input type="submit" value="Back" /> </form> 
  </body>
</html>