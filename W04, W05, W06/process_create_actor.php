<?php
  $link = mysqli_connect("localhost","root","rootroot","dbp");
  $filtered = array(
    'name' => mysqli_real_escape_string($link, $_POST['name']),
    'gender' => mysqli_real_escape_string($link, $_POST['gender'])
  );
  $query = "
    INSERT INTO actor
      (name, gender)
      VALUE (
        '{$filtered['name']}',
        '{$filtered['gender']}')
  ";

  $result = mysqli_query($link, $query);
  if($result == false){
    echo '저장하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysqli_error($link));
  } else {
    header('Location: actor.php');
    }
?>
