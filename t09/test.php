<?php
header('Content-Type: text/html; charset=utf-8');
$conn = mysqli_connect("localhost","dbp2020","epqpvmf9!","dbp2020");

if (mysqli_connect_errno()){
echo "MySQL 연결 오류: " . mysqli_connect_error();
exit;
} else {
echo "DB : 접속 성공<br/>";
}
?> 

<!--epqpvmf9!-->