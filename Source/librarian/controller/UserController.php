<?php

namespace Source\librarian\controller;

use Source\librarian\controller\BaseController;
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
        $baseController =  new BaseController();
        if ($name == "" or $username == "" or $password == "" or $email == "" or $phone == "" or $address == "") {
            return "Các trường không được để trống!";
        }

        // kiểm tra Độ dài
        if(strlen($name) < 8) {
            return "Tên người dùng quá ngắn";
        } elseif (strlen($name) > 50) {
            return "Tên người dùng quá dài";
        } elseif (!$baseController->validateName(($name))) {
            return "Tên người dùng không được có kí tự đặc biệt";
        }

        if(strlen($username) < 8) {
            return "Tài Khoản người dùng quá ngắn";
        } elseif (strlen($username) > 50) {
            return "Tài Khoản người dùng quá dài";
        } elseif (!$baseController->validateUsernname(($username))) {
            return "Tài Khoản người dùng không được có kí tự đặc biệt";
        }

        if(strlen($password) < 8) {
            return "Mật khẩu người dùng quá ngắn";
        } elseif (strlen($password) > 50) {
            return "Mật khẩu người dùng quá dài";
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            return "Email không đúng định dạng";
        }

        if(!$baseController->validatePhone(($phone)) ) {
            return "Số điện thoại không đúng định dạng";
        }
        
        $photo = "upload/avatar.jpg";
        // câu truy vấn
        $con = mysqli_connect("localhost", "root", "", "project_new");
        $sql_u = mysqli_query($con, "select * from users where username= '$username'");
        $sql_e = mysqli_query($con, "select * from users where email= '$email'");
        $sql_p = mysqli_query($con, "select * from users where phone= '$phone'");

        if (mysqli_num_rows($sql_u) > 0) {
            return "Tài khoản đã tồn tại";
        } elseif (mysqli_num_rows($sql_e) > 0) {
            return "Email đã tồn tại";
        } elseif (mysqli_num_rows($sql_p) > 0) {
            return "Số điện thoại đã tồn tại";
        } else {
            // $vkey = md5(time().$username);
            $sql = "INSERT INTO users values('','$name','$username','$password','$email','$phone','$address','$utype','$photo','yes')";
            $insert = mysqli_query($con, $sql);
            if ($insert) {
                return "Thêm thành công!";
            } else {
                return "Thêm thất bại";
            }
        }
    }

    public function login($username, $password)
    {
        $con= mysqli_connect("localhost","root","");
        mysqli_select_db($con, "project_new");
        if(! $con ){
           die('Could not connect: ' );
        }

        if ($username == "" || $password == "") {
            return "Các trường không được để trống!";
        } else if(strlen($username) < 8) {
            return "Username không được ngắn hơn 8 kí tự!";
        } else if(strlen($username) > 200) {
            return "Username không được dài hơn 200 kí tự";
        } else if(strlen($password) < 8) {
            return "Mật khẩu không được ngắn hơn 8 kí tự!";
        } else if(strlen($password) > 16) {
            return "Mật khẩu không được dài hơn 16 kí tự!";
        } else {
            $count = 0;
            $res = mysqli_query($con, "SELECT * from users where `username`= '$username' and `password`= '$password' and `status`='yes'");
            $count = mysqli_num_rows($res);
            if ($count != 0) {
                return "Thành công!";
            } else {
                return "Tài khoản không tồn tại!";
            }
        }
    }
}
