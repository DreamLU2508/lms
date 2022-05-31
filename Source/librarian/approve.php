<?php
    session_start();
    if (!isset($_SESSION["id"])) {
    ?>
        <script type="text/javascript">
            window.location="index.php";
        </script>
    <?php
    }

	include 'inc/connection.php';
	$id= $_GET["id"];
	mysqli_query($link, "update users set status='yes' where id=$id");
 ?>

 <script type="text/javascript">
     alert("Kích hoạt thành công");
 	window.location="status.php";
 </script>
