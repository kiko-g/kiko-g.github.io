<!DOCTYPE html>
<html lang=en>
<head>
  <title>List News (5)</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
  h1 {
    color: dodgerblue;
  }
</style>

<body>
  <h1>3. SQLite Database creation</h1>
  <br>
  <h1>4. Listing data from SQLite</h1>
    <?php
      $db = new PDO('sqlite:news.db');
      $stmt = $db->prepare('SELECT * FROM news');
      $stmt->execute();
      $articles = $stmt->fetchAll();

      foreach($articles as $article) {
        echo '<h3>' . $article['title'] . '</h3>' . "\n";
        echo '<p>' . $article['introduction'] . '</p>' . "\n";
      }
    ?>
  <br>
  <h1>5. Complete Page</h1>
    <?php
      $stmt = $db->prepare(
        'SELECT news.*, users.*, COUNT(comments.id) AS comments
        FROM news JOIN 
            users USING (username) LEFT JOIN 
            comments ON comments.news_id = news.id 
        GROUP BY news.id, users.username 
        ORDER BY published DESC'
      );
      
      $stmt->execute();
      $comments = $stmt->fetchAll();
    ?>

  
</body>
</html>