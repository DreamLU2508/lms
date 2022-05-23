<?php 
	 $link= mysqli_connect("localhost","root","");
     mysqli_select_db($link, "project_new");
     if(! $link ){
        die('Could not connect: ' );
     }
 ?>


