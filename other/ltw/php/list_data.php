<?php
  $db = new PDO('sqlite:news.db');

  $stmt = $db->prepare('SELECT * FROM news');
  $stmt->execute();  
  $articles = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <title>Listing Data with SQLite</title>
</head>

<body>
<?php
  foreach($articles as $article) {
    echo '<h1>' . $article['title'] . '</h1>';
    echo '<p>' . $article['introduction'] . '</p>';
  }
?>

<form class="back-button" action="index.php"> <input type="submit" value="Back" /> </form> 
</body>
</html>