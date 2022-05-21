<?php
    include '../inc/connection.php';

    class LoginStudent{
        public $id;
        public $name;
        public $username;
        public $password;
        public $lecturer;
        public $email;
        public $phone;
        public $idno;
        public $address;
        public $utype;
        public $photo;
        public $status;
        public $vkey;
        public $verified;
    }

if (isset($_POST["login"])) {
    $array = array();
    $count = 0;
    $res = mysqli_query($link, "select * from t_registration where username='$_POST[username]' && password= '$_POST[password]' && status='yes' && verified='yes'");
    $count = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);
    if ($count != 0) {
        $tmp = new LoginStudent();
        $tmp->id = $row['id'];
        $tmp->name = $row['name'];
        $tmp->username = $row['username'];
        $tmp->password = $row['password'];
        $tmp->lecturer = $row['lecturer'];
        $tmp->email = $row['email'];
        $tmp->phone = $row['phone'];
        $tmp->idno = $row['idno'];
        $tmp->address = $row['address'];
        $tmp->utype = $row['utype'];
        $tmp->photo = $row['photo'];
        $tmp->status = $row['status'];
        $tmp->vkey = $row['vkey'];
        $tmp->verified = $row['verified'];

        array_push($array,$tmp);
    }
    
    echo json_encode($array);
    mysqli_close($link);
}
?>