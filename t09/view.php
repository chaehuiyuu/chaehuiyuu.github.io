<?php
                $connect = mysqli_connect("localhost", "dbp2020","epqpvmf9!","dbp2020");
                $id = $_GET['id'];
                session_start();
                $query = "select name, title, contents, date, view from board where id =$id";
                $result = $connect->query($query);
                $rows = mysqli_fetch_array($result);

                $increase_sql = "UPDATE board SET view = view+1 WHERE id ='$id'";
                $increase_result = $connect->query($increase_sql);

        ?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>글 읽기</title>
<style>
.view_table {
  border: 1px solid #444444;
  margin-top: 30px;
}
.view_title {
height: 30px;
text-align: center;
background-color: #cccccc;
color: white;
width: 1000px;
}
.view_id {
text-align: center;
background-color: #EEEEEE;
width: 30px;
}
.view_id2 {
background-color: white;
width: 60px;
}
.view_hit {
background-color: #EEEEEE;
width: 30px;
text-align: center;
}
.view_hit2 {
background-color: white;
width: 60px;
}
.view_content {
padding-top: 20px;
border-top: 1px solid #444444;
height: 500px;
}
.view_btn {
width: 700px;
height: 200px;
text-align: center;
margin: auto;
margin-top: 50px;
}
.view_btn1 {
height: 50px;
width: 100px;
font-size: 20px;
text-align: center;
background-color: white;
border: 2px solid black;
border-radius: 10px;
}
.view_comment_input {
width: 700px;
height: 500px;
text-align: center;
margin: auto;
}
.view_text3 {
font-weight: bold;
float: left;
margin-left: 20px;
}
.view_com_id {
width: 100px;
}
.view_comment {
width: 500px;
}
</style>

</head>
      <body>
        <center>
        <table class="view_table" align=center>
                <tr>
                        <td colspan="4" class="view_title"><?php echo $rows['title']?></td>
                </tr>
                <tr>
                        <td class="view_name">작성자</td>
                        <td class="view_name2"><?php echo $rows['name']?></td>
                        <td class="view_view">조회수</td>
                        <td class="view_view2"><?php echo $rows['view']?></td>
                </tr>


                <tr>
                        <td colspan="4" class="view_content" valign="top">
                        <?php echo $rows['contents']?></td>
                </tr>
                </table>

                <div class="view_btn">
                                <button class="view_btn1" onclick="location.href='/index.php'">목록으로</button>

                </div>
    </body>
</html>
