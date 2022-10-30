<?php
if (isset($_POST["submit"])) {
	$name = $_POST["name"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$address = $_POST["address"];
	$utype = $_POST["utype"];
	if ($name == "" | $username == "" | $password == "" | $email == "" | $phone == "" | $address == "") {
		$error_m = "Lỗi! <span>các trường không được để trống</span>";
	}
	$photo = "upload/avatar.jpg";

	if (!isset($error_m)) {
		$sql_u = mysqli_query($link, "select * from users where username= '$username'");
		$sql_e = mysqli_query($link, "select * from users where email= '$email'");
		$sql_p = mysqli_query($link, "select * from users where phone= '$phone'");

		if (mysqli_num_rows($sql_u) > 0) {
			$error_uname = "Tài khoản đã tồn tại";
		} elseif (mysqli_num_rows($sql_e) > 0) {
			$error_email = "Email đã tồn tại";
		} elseif (mysqli_num_rows($sql_p) > 0) {
			$error_phone = "Số điện thoại đã tồn tại";
		} elseif (strlen($username) < 6) {
			$error_ua = "Username too short";
		} elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
			$e_msg = "<div class='alert alert-danger'><strong>Lỗi ! </strong>Email không đúng định dạng</div>";
		} else {
			// $vkey = md5(time().$username);
			$sql = "INSERT INTO users values('','$name','$username','$password','$email','$phone','$address','$utype','$photo','yes')";
			$insert = mysqli_query($link, $sql);
			if ($insert) {
?>
				<script>
					alert("Thêm thành công");
				</script>
<?php
			} else {
				echo $mysqli->error;
			}
		}
	}
}
?>