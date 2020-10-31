<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 직원 관리 시스템 </title>
</head>
<body>
    <h1>직원 관리 시스템</h1>

    <form action="emp_info.php" method="POST">
        (1) 직원 정보 조회 :
        <input type="text" name="emp_no" placeholder="직원 번호를 입력하세요">
        <input type="submit" value="Search">
    </form><br>
    <form action="year_of_work.php" method="POST">
        (2) 직원 고용 정보 :
        <input type="text" name="emp_no" placeholder="직원 번호를 입력하세요">
        <input type="submit" value="Search">
    </form><br>
    <a href="dept_manager_info.php">(3) 부서별 담당자 정보</a>
</body>
</html>