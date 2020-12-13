<?php
    $conn = mysqli_connect("localhost","dbp2020","epqpvmf9!","dbp2020");
    $query = "SELECT * FROM `public_toilet` WHERE `구분` = '공중화장실'";
    $result = mysqli_query($conn, $query);
    $toilet_info = '';
    while($row = mysqli_fetch_array($result)){
        $emp_info .= '<tr>';
        $emp_info .= '<td width="120">'.$row['화장실명'].'</td>';
        $emp_info .= '<td width="200">'.$row['소재지도로명주소'].'</td>';
        $emp_info .= '<td width="200">'.$row['소재지지번주소'].'</td>';
        $emp_info .= '<td>'.$row['남녀공용화장실여부'].'</td>';
        $emp_info .= '<td width="200">'.$row['개방시간'].'</td>';
        $emp_info .= '<td>'.$row['전화번호'].'</td>';
        $emp_info .= '</tr>';
    }

    mysqli_free_result($result);
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>  </title>
    <style>
        th, td{
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>

</head>

<body>
    <h2><a href="index.html">메인페이지로 돌아가기</a></h2>
    <table>
        <tr>
            <th>화장실명</th>
            <th>도로명주소</th>
            <th>지번주소</th>
            <th>남녀공용</th>
            <th>개방시간</th>
            <th>전화번호</th>
        </tr>
        <?=$emp_info?>
    </table>
</body>

</html>