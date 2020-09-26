<?php
  $link = mysqli_connect('localhost','root','rootroot','dbp');
  $query = "select * from drama";
  $result = mysqli_query($link, $query);
  $list = '';

  while($row = mysqli_fetch_array($result)){
    $list =  $list."<li><a
    href =\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  $article = array(
    'title' => 'D R A M A',
    'description' => '당신이 제일 좋아하는 드라마는?'
  );
  $update_link = '';
  $actor = '';

  $delete_link = '';

if(isset($_GET['id']) ){
  $filtered_id = mysqli_real_escape_string($link,$_GET['id']);
  $query = "SELECT * FROM drama left join actor on drama.actor_id = actor.id WHERE drama.id={$filtered_id}";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);
  $article['title'] = htmlspecialchars($row['title']);
  $article['description'] = htmlspecialchars($row['description']);
  $article['name'] = htmlspecialchars($row['name']);

  $update_link = '<a href="update.php?id='.$_GET['id'].'">수정</a>';
  $delete_link='
  <form action="process_delete.php" method="POST">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="delete">
      </form>
      ';

  $actor = "<p>by{$article['name']}</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> MY FAVORITE DRAMA </title>
</head>
<body>
  <h1><a href="index.php">MY FAVORITE DRAMA</a></H1>
    <a href="actor.php">author</a>
  <ol><?= $list ?></ol>
  <a href="create.php">추가</a>
  <?=$update_link?>
  <?=$delete_link?>
  <h2><?= $article['title'] ?></h2>
  <?= $article['description'] ?>
  <?= $actor ?>
</body>
</html>
