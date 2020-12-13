<?php
                $connect = mysqli_connect("localhost", "dbp2020","epqpvmf9!","dbp2020") or die("fail");

                $name = $_POST[name];
                $title = $_POST[title];
                $contents = $_POST[contents];
                $date = date('Y-m-d H:i:s');

                $URL = '/index.php';


                $query = "INSERT INTO board (name ,title, contents, date, view)
                        VALUES('$name','$title', '$contents', '$date',0)";


                $result = $connect->query($query);
                if($result){
?>                  <script>
                        alert("<?php echo "GOODJOB."?>");
                        location.replace("<?php echo $URL?>");
                    </script>
<?php
                }
                else{
                        echo "FAIL";
                }

                mysqli_close($connect);
?>
