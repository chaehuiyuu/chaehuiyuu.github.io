<!DOCTYPE html>

<html>
<head>
        <meta charset = 'utf-8'>
</head>
<style>
        table{
                border-top: 1px solid #444444;
                border-collapse: collapse;
        }
        tr{
                border-bottom: 1px solid #444444;
                padding: 10px;
        }
        td{
                border-bottom: 1px solid #efefef;
                padding: 10px;
        }
        table .even{
                background: #efefef;
        }
        .text{
                text-align:center;
                padding-top:20px;
                color:#000000
        }
        .text:hover{
                text-decoration: underline;
        }
        a:link {color : #57A0EE; text-decoration:none;}
        a:hover { text-decoration : underline;}
</style>
<body>
<?php
                $connect = mysqli_connect("localhost", "dbp2020","epqpvmf9!","dbp2020") or die ("connect fail");
                $query ="select * from board order by id desc";
                $result = $connect->query($query);
                $total = mysqli_num_rows($result);

        ?>
        <h2 align=center><a href="index.html">후기 게시판</a></h2>
        <table align = center>
        <thead align = "center">
        <tr>
        <td width = "50" align="center">번호</td>
        <td width = "500" align = "center">제목</td>
        <td width = "100" align = "center">작성자</td>
        <td width = "200" align = "center">날짜</td>
        <td width = "50" align = "center">조회수</td>
        </tr>
        </thead>

        <tbody>
        <?php
                while($rows = mysqli_fetch_assoc($result)){
                        if($total%2==0){
        ?>                      <tr class = "even">
                        <?php   }
                        else{
        ?>                      <tr>
                        <?php } ?>
                <td width = "50" align = "center"><?php echo $total?></td>
                <td width = "500" align = "center">
                <a href = "/board/view.php?id=<?php echo $rows['id']?>">
                <?php echo $rows['title']?></td>
                  <td width = "100" align = "center"><?php echo $rows['name']?></td>
                <td width = "200" align = "center"><?php echo $rows['date']?></td>
                <td width = "50" align = "center"><?php echo $rows['view']?></td>
                </tr>
        <?php
                $total--;
                }
        ?>
        </tbody>
        </table>

        <div class = text>
        <font style="cursor: hand"onClick="location.href='board/write.php'">글쓰기</font>
        </div>






</body>
</html>
