<?php 
	include 'inc/connection.php';
	$id= $_GET["id"];
	mysqli_query($link, "update users set status='no' where id=$id");
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
    $subject = "Account Approve problem";
    $message = "We can't approve your account. Might be your information is not correct. Please register with real information <br> Thanks";
    $headers = "From: parttimemail18@gmail.com";
    mail($to,$subject,$message,$headers);
?>