<!doctype html>
<head>
<meta charset="UTF-8">
<title>후기게시판</title>
<style>
        h1{
          text-align: center;
        }

        h4 {
          text-align :center;
        }
        table.table2{
                border-collapse: separate;
                border-spacing: 1px;
                text-align: left;
                line-height: 1.5;
                border-top: 1px solid #ccc;
                margin : 20px 10px;
        }
        table.table2 tr {
                 width: 200px;
                 padding: 10px;
                font-weight: bold;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
        }
        table.table2 td {
                 width: 100px;
                 padding: 10px;
                 vertical-align: top;
                 border-bottom: 1px solid #ccc;
        }


</style>
</head>
<body>
        <h1><a href="/index.php">후기 게시판</a></h1>
        <h4>글을 작성하는 공간입니다.</h4>
        <form action="write_ok.php" method="post">
        <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >

                        <tr>
                        <td bgcolor=white>
                        <table class = "table2">
                                <tr>
                                <td>작성자</td>
                                <td><input type = text name = name size=20> </td>
                                </tr>

                                <tr>
                                <td>제목</td>
                                <td><input type = text name = title size=60></td>
                                </tr>

                                <tr>
                                <td>내용</td>
                                <td><textarea name = contents cols=85 rows=15></textarea></td>
                                </tr>

                              </table>

                                <center>
                                <button type = "submit">글작성</button>
                                </center>
                        </td>
                        </tr>
                </table>
              </form>
    </body>
</html>
