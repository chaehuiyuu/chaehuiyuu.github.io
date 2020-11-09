<?php
  $link = mysqli_connect("localhost","root","rootroot","dbp");
  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id']),
    'name' => mysqli_real_escape_string($link,$_POST['name']),
    'gender' => mysqli_real_escape_string($link, $_POST['gender'])
  );
  $query = "
    UPDATE actor
      SET
        name='{$filtered['name']}',
        gender='{$filtered['gender']}'
      WHERE
        id = '{$filtered['id']}'
  ";

  $result = mysqli_query($link, $query);
  if($result == false){
    echo '수정하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysqli_error($link));
  } else {
    header('Location: actor.php');
  }
?>
