<?php   
    $link=mysqli_connect('localhost','admin','admin','employees');

    if(mysqli_connect_error()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }
    $query="
        SELECT  d.dept_no, dp.dept_name, e.first_name,e.emp_no FROM employees e 
        INNER JOIN dept_manager d ON e.emp_no=d.emp_no
        INNER JOIN departments dp ON d.dept_no=dp.dept_no
        ORDER BY dept_no
        ";

    $article="";

    $result = mysqli_query($link, $query);
    while($row=mysqli_fetch_array($result)){
        $article .= '<tㄱ><td>';
        $article .= $row['dept_no'];
        $article .= '</td><td>';
        $article .= $row['dept_name'];
        $article .= '</td><td>';
        $article .= $row['first_name'];
        $article .= '</td><td>';
        $article .= $row['emp_no'];
        $article .= '</td></tr>';

    }

    mysqli_free_result($result);
    mysqli_close($link);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 부서별 담당자 정보 </title>
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
    <h2><a href="index.php"> 직원 관리 시스템</a> | 부서별 담당자 정보 </h2>
    <table>
        <tr>
            <th>부서 번호</th>
            <th>부서명</th>
            <th>담당자 이름</th>
            <th>직원 번호</th>
        </tr>
        <?= $article ?>

    </table>
</body>


</html>