<?php   
    $link=mysqli_connect('localhost','admin','admin','employees');

    if(mysqli_connect_error()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $query="
             select e.emp_no, e.first_name, s.salary, e.gender
              from employees e
              inner join salaries s on e.emp_no=s.emp_no
              order by salary desc limit 20 
        ";

    $article="";

    $result = mysqli_query($link, $query);
    while($row=mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row['emp_no'];
        $article .= '</td><td>';
        $article .= $row['first_name'];
        $article .= '</td><td>';
        $article .= $row['salary'];
        $article .= '</td><td>';
        $article .= $row['gender'];
        $article .= '</td></tr>';

    }

    mysqli_free_result($result);
    mysqli_close($link);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 연봉 TOP20  </title>
    <style>
        body{
            font-family: Consolas, monospace;
            font-family: 12px;
        }
        table{
            width:100%;
        }
        th,td{
            padding:10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>
<body>
    <h2><a href="index.php"> 직원 관리 시스템</a> | 연봉 정보 </h2>
    <table>
        <tr>
            <th>empno</th>
            <th>first_name</th>
            <th>salary</th>
            <th>gender</th>
        </tr>
        <?= $article ?>

    </table>
</body>


</html>