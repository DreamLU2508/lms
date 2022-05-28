<?php
    include "../inc/connection.php";

    if(isset($_POST['user_id']) && isset($_POST['book_id'])){
        $user_id = $_POST['user_id'];
        $book_id = $_POST['book_id'];

        $currentDate = time();
        $expirationDate = date("d/m/Y", strtotime("+90 day", $currentDate));
        $sql = "INSERT INTO issue_book VALUES ('".$user_id."','".$book_id."','".date("d/m/Y", $currentDate)."')";
        $sql2 = "INSERT INTO return_book VALUES ('".$user_id."','".$book_id."','','".$expirationDate."', 0)";
        if(mysqli_query($link, $sql) and mysqli_query($link, $sql2)){
            echo "ok";
        }
    }

?>