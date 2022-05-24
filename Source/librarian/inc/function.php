<?php
	if (isset($_POST["submit"])) {
		$name = $_POST["name"];
		$username = $_POST["username"];                   
		$password = $_POST["password"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$address = $_POST["address"];
		$utype = $_POST["utype"];
		if ($name == "" | $username =="" | $password =="" | $email == "" | $phone == "" | $address == "") {
			$error_m= "Error! <span>Feild mustn't be empty</span>";

		}
		$photo = "upload/avatar.jpg";
		
         
//          elseif(preg_match('/[^a-z0-9_-]+/i', $username)){
//             $error_msg = "<div class='alert alert-danger'><strong>Error ! </strong>username Must be contain numerical alphabet, dashes, number and Underscore</div>";
//            }
		
		$sql_u= mysqli_query($link,"select * from users where username= '$username'");
		$sql_e= mysqli_query($link,"select * from users where email= '$email'");
		$sql_p= mysqli_query($link,"select * from users where phone= '$phone'");
        
		if(mysqli_num_rows($sql_u) > 0){
			$error_uname = "Username already exist";
		}
        elseif(mysqli_num_rows($sql_e) > 0){
            $error_email = "Email already exist";
        }
        elseif(mysqli_num_rows($sql_p) > 0){
            $error_phone = "Phone already registered";
        }
		elseif(strlen($username) < 6){
            $error_ua ="Username too short";
        }elseif (filter_var($email, FILTER_VALIDATE_EMAIL)== false) {
				$e_msg = "<div class='alert alert-danger'><strong>Error ! </strong>Email Address Not Valid</div>";
		} 
		else{
		    // $vkey = md5(time().$username);
			$sql = "INSERT INTO users values('','$name','$username','$password','$email','$phone','$address','$utype','$photo','yes')";
		    $insert = mysqli_query($link, $sql);
            // if($insert){
            //     $to = "$email";
            //     $subject = "Email Verification";
            //     $message = "<a href='http://localhost/lms/Source/librarian/user/student/verify.php?vkey=$vkey'>Verify Email</a>";
            //     $headers = "From: parttimemail18@gmail.com \r\n";
            //     $headers.= "MIME-Version: 1.0". "\r\n";
            //     $headers.= "Content-type: text/html; charset-UTF-8". "\r\n";
            //     mail($to, $subject, $message,$headers);

            // }else{
            //     echo $mysqli->error;
            // }
		}
	}
?>

