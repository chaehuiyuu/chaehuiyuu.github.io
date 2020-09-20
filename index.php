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
  $delete_link = '';

if(isset($_GET['id']) ){
  $query = "SELECT * FROM drama WHERE id={$_GET['id']}";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);
  $article = array(
    'title' => $row['title'],
    'description' => $row['description']
  );
  $update_link = '<a href="update.php?id='.$_GET['id'].'">수정</a>';
  $delete_link='<form action="process_delete.php" method="POST">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="delete">
      </form>
      ';
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
  <a href="create.php">추가</a>
  <?=$update_link?>
  <?=$delete_link?>
  <h2><?= $article['title'] ?></h2>
  <?= $article['description'] ?>
</body>
</html>
