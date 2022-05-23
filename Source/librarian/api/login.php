<?php
    include '../inc/connection.php';

    class LoginStudent{
        public $id;
        public $name;
        public $username;
        public $password;
        public $email;
        public $phone;
        public $address;
        public $utype;
        public $photo;
        public $status;
    }
    
if (isset($_POST["login"])) {
    $array = array();
    $count = 0;
    $res = mysqli_query($link, "select * from users where username='$_POST[username]' && password= '$_POST[password]' && status='yes' ");
    $count = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);
    if ($count != 0) {
        $tmp = new LoginStudent();
        $tmp->id = $row['id'];
        $tmp->name = $row['name'];
        $tmp->username = $row['username'];
        $tmp->password = $row['password'];
        $tmp->email = $row['email'];
        $tmp->phone = $row['phone'];
        $tmp->address = $row['address'];
        $tmp->utype = $row['utype'];
        $tmp->photo = $row['photo'];
        $tmp->status = $row['status'];

        array_push($array,$tmp);
    }
    
    echo json_encode($array);
    mysqli_close($link);
}
?>