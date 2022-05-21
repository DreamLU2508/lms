<?php
    include '../inc/connection.php';
//if (isset($_POST["login"])) {
    $count = 0;
    $res = mysqli_query($link, "select * from std_registration where username='pompously' && password= '123456' && status='yes' && verified='yes' ");
    $count = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);
    if ($count != 0) {
        echo $row["username"];
    }
    var_dump($count);
//}
?>