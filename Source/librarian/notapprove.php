<?php 
	include 'inc/connection.php';
	$id= $_GET["id"];
	mysqli_query($link, "update users set status='no' where id=$id");
 ?>
 <script type="text/javascript">
     alert("Hủy Kích hoạt thành công");
 	window.location="status.php";
 </script>
