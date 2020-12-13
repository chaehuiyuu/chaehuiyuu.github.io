
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
<div id="board_area">
  <h1>후기 게시판</h1>
  <h4>화장실 위치와 이용하신 시간을 꼭 작성해주세요!</h4>
    <table class="list-table">
      <thead>
          <tr>
                <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">작성자 이름</th>
                <th width="100">작성일</th>
                <th width="100">조회수</th>
            </tr>
        </thead>
        <?php
           $currentPage = 1;
           if (isset($_GET["currentPage"])) {
               $currentPage = $_GET["currentPage"];
           }

           //mysqli_connect()함수로 커넥션 객체 생성
           $conn = mysqli_connect("localhost", "dbp2020","epqpvmf9!","dbp2020");
           //커넥션 객체 생성 확인
           if($conn) {
               echo "연결 성공<br>";
           } else {
               die("연결 실패 : " .mysqli_error());
           }

           //페이징 작업을 위한 테이블 내 전체 행 갯수 조회 쿼리
           $sqlCount = "SELECT count(*) FROM board";
           $resultCount = mysqli_query($conn,$sqlCount);
           if($rowCount = mysqli_fetch_array($resultCount)){
               $totalRowNum = $rowCount["count(*)"];   //php는 지역 변수를 밖에서 사용 가능.
           }

           if($resultCount) {
                echo "행 갯수 조회 성공 : ". $totalRowNum."<br>";
            } else {
                echo "결과 없음: ".mysqli_error($conn);
            }

            $rowPerPage = 5;   //페이지당 보여줄 게시물 행의 수
            $begin = ($currentPage -1) * $rowPerPage;
            //board 테이블을 조회해서 board_no, board_title, board_user, board_date 필드 값을 내림차순으로 정렬하여 모두 가져 오는 쿼리
            //입력된 begin값과 rowPerPage 값에 따라 가져오는 행의 시작과 갯수가 달라지는 쿼리
            $sql = "SELECT * FROM board order by id";
            $result = mysqli_query($conn,$sql);
            //쿼리 조회 결과가 있는지 확인
            if($result) {
                echo "조회 성공";
            } else {
                echo "결과 없음: ".mysqli_error($conn);
              }

           ?>


      <tbody>
        <tr>
          <td width="70"><?php echo $sql['id']; ?></td>
          <td width="500"><?php echo $sql['title'];?></a></td>
          <td width="120"><?php echo $sql['name']?></td>
          <td width="100"><?php echo $sql['date']?></td>
          <td width="100"><?php echo $sql['view']; ?></td>
        </tr>
      </tbody>

    </table>
    <div id="write_btn">
      <a href="write.php"><button>글쓰기</button></a>
    </div>
  </div>
</body>
</html>
