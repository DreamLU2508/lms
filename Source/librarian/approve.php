<?php
    session_start();
    if (!isset($_SESSION["username"])) {
    ?>
        <script type="text/javascript">
            window.location="login.php";
        </script>
    <?php
    }

	include 'inc/connection.php';
	$id= $_GET["id"];
	mysqli_query($link, "update users set status='yes' where id=$id");
 ?>

 <script type="text/javascript">
 	window.location="status.php";
 </script>


<?php 
     $res = mysqli_query($link, "select * from users where id=$id");
    while($row = mysqli_fetch_array($res)){
        $email      = $row['email']; 
    }
    $to = "$email";
    $subject = "Account Conformation";
    $message = "Your account is approved. Now you can login your account";
    $headers = "From: parttimemail18@gmail.com";
    mail($to,$subject,$message,$headers);
?>

 