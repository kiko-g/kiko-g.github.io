<!DOCTYPE html>
<html lang=en>
<head>
  <title>News Item (5)</title>
  <style>
    h1 {
      color: dodgerblue;
    }
  </style>  
</head>

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
    $db = new PDO('sqlite:news.db');
    $stmt = $db->prepare('SELECT * FROM news');
    $stmt->execute();
    $articles = $stmt->fetchAll();
    
    $query = 'SELECT news.*, users.*, COUNT(comments.id) AS comments
    FROM news JOIN 
        users USING (username) LEFT JOIN 
        comments ON comments.news_id = news.id 
    GROUP BY news.id, users.username 
    ORDER BY published DESC';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $comments = $stmt->fetchAll();

    # item information
    $stmt = $db->prepare('SELECT * FROM news JOIN users USING (username) WHERE id = :id');
    $stmt->execute(array($_GET['id'])); // $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT); $stmt->execute();
    $article = $stmt->fetch();

    # item comments
    $stmt = $db->prepare('SELECT * FROM comments JOIN users USING (username) WHERE news_id = ?');
    $stmt->execute(array($_GET['id']));
    $comments = $stmt->fetchAll();
  ?>
</body>
</html>