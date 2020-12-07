<?php
  $link = mysqli_connect("localhost","root","rootroot","dbp");

  $query = "SELECT * from actor";
  $result = mysqli_query($link, $query);
  $author_info = '';

  while ($row = mysqli_fetch_array($result)) {
    $filtered = array(
      'id' => htmlspecialchars($row['id']),
      'name' => htmlspecialchars($row['name']),
      'gender' => htmlspecialchars($row['gender'])
    );
    $actor_info.='<tr>';
    $actor_info.='<td>'.$filtered['id'].'</td>';
    $actor_info.='<td>'.$filtered['name'].'</td>';
    $actor_info.='<td>'.$filtered['gender'].'</td>';
    $actor_info.='<td><a href="actor.php?id='.$filtered['id'].'">update</a></td>';
    $actor_info.='
      <td>
        <form action="process_delete_actor.php" method="post">
          <input type="hidden" name="id" value="'.$filtered['id'].'">
          <input type="submit" value="delete">
          </form>
      </td>';
    $actor_info.='</tr>';
  };

$escaped = array(
  'name' => '',
  'gender' => ''
);

$form_action = 'process_create_actor.php';
$label_submit = 'Create actor';
$form_id = '';

if(isset($_GET['id'])){
  $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
  settype($filtered_id,'integer');
  $query = "SELECT * FROM actor where id ={$filtered_id}";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);
  $escaped['name'] = htmlspecialchars($row['name']);
  $escaped['gender'] = htmlspecialchars($row['profile']);

  $form_action = 'process_update_actor.php';
  $label_submit = 'Update actor';
  $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
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
   <p><a href="index.php">drama</a></p>
     <table border="1">
       <tr>
         <th>id</th>
         <th>name</th>
         <th>gender</th>
         <th>update</th>
         <th>delete</th>
       </tr>
       <?= $actor_info ?>
     </table>
     <br>
     <form action="<?= $form_action ?>" method="post">
       <?= $form_id ?>
       <label for="fname">name:</label><br>
       <input type="text" id="name" name="name" placeholder="name"
       value="<?=$escaped['name']?>"><br>
       <label for="lname">gender:</label><br>
       <input type="text" id="gender" name="gender" placeholder="gender"
       value="<?=$escaped['gender']?>"><br><br>
       <input type="submit" value="<?= $label_submit ?>">
     </form>
 </body>
 </html>
