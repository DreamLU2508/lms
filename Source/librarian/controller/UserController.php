<?php
include '../inc/connection.php';
function validateDate($date, $format = 'dd/MM/YY')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}
class UserController
{
    public $link;
    public function __construct()
    {
        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "project_new");
        if (!$link) {
            die('Could not connect: ');
        }
    }

    public function addUser($name, $username, $password, $email, $phone, $address, $utype)
    {
        if ($name == "" or $username == "" or $password == "" or $email == "" or $phone == "" or $address == "") {
            return "Các trường không được để trống!";
        }
        $photo = "upload/avatar.jpg";

        $sql_u = mysqli_query($this->link, "select * from users where username= '$username'");
        $sql_e = mysqli_query($this->link, "select * from users where email= '$email'");
        $sql_p = mysqli_query($this->link, "select * from users where phone= '$phone'");

        if (mysqli_num_rows($sql_u) > 0) {
            return "Tài khoản đã tồn tại";
        } elseif (mysqli_num_rows($sql_e) > 0) {
            return "Email đã tồn tại";
        } elseif (mysqli_num_rows($sql_p) > 0) {
            return "Số điện thoại đã tồn tại";
        } elseif (strlen($username) < 6) {
            return "Username quá ngắn";
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            return "Email không đúng định dạng";
        } else {
            // $vkey = md5(time().$username);
            $sql = "INSERT INTO users values('','$name','$username','$password','$email','$phone','$address','$utype','$photo','yes')";
            $insert = mysqli_query($this->link, $sql);
            if ($insert) {
                return "Thêm thành công!";
            } else {
                return "Thêm thất bại";
            }
        }
    }
}


