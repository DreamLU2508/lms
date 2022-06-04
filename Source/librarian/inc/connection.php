<?php 
	 $link= mysqli_connect("localhost","root","");
     mysqli_select_db($link, "tmp_project");
     if(! $link ){
        die('Could not connect: ' );
     }
 ?>


