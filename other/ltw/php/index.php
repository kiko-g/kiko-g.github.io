<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <title>PHP</title>
</head>

<body>
  <h1>1. First PHP Script</h1>
  <?php echo "<h2>Hello World!</h2>"?>

  <h1>2. HTTP Parameters</h1>
  <fieldset>
    <form action="sum2.php" method="get">
      <label>Number 1<input type="number" name="x"></label>
      <label>Number 2<input type="number" name="y"></label>
      <input type="submit" value="Sum">
    </form>
  </fieldset>

  <h1>3. SQLite Database creation</h1>

  <h1>4. Listing data from SQLite</h1>
  <form action="list_data.php">
    <input type="submit" value="List Data">
  </form>

  <h1>5. Complete Page</h1>
  <form action="list_news.php" method="get">
    <input type="submit" value="News Page">
  </form>

  <h1>6. Data layer separation</h1>
</body>

</html>