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
    'description' => 'What is your favorite drama?'
  );

if(isset($_GET['id']) ){
  $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
  $query = "SELECT * FROM drama WHERE id={$_GET['id']}";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);
  $article = array(
    'title' => $row['title'],
    'description' => $row['description']
  );
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
  <ol><?= $list ?></ol>
</body>
</html>
