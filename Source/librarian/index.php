<?php
    session_start();
    include 'inc/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hệ thống quản lý thư viện</title>
    <link rel="stylesheet" href="inc/css/bootstrap.min.css">
    <link rel="stylesheet" href="inc/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="inc/css/pro1.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600" rel="stylesheet">
    <style>
        .login{
            background-image: url(inc/img/3.jpg);
            margin-bottom: 30px;
            padding: 50px;
            padding-bottom: 70px;
        }
        .reg-header h2{
            color: #DDDDDD;
            z-index: 999999;
        }
        .login-body h4{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login registration">
        <div class="wrapper">
            <div class="reg-header text-center">
                <h2>Quản lý thư viện</h2>
                <div class="gap-30"></div>
                <div class="gap-30"></div>
            </div>
            <div class="gap-30"></div>
            <div class="login-content">
                <div class="login-body">
                    <h4>Đăng nhập thủ thư</h4>
                    <form action="" method="post">
                        <div class="mb-20">
                            <input type="text" name="username" class="form-control" placeholder="Tài khoản" required=""/>
                        </div>
                        <div class="mb-20">
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required=""/>
                        </div>
                        <div class="mb-20">
                            <input class="btn btn-info submit" type="submit" name="login" value="Đăng nhập">
                            
                        </div>
                    </form>
                </div>
                <?php
                if (isset($_POST["login"])) {
                    $count=0;
                    $res= mysqli_query($link, "select * from lib_registration where username='$_POST[username]' && password= '$_POST[password]' ");
                    $count = mysqli_num_rows($res);
                    if ($count==0) {
                        ?>
                        <div class="alert alert-warning">
                            <strong style="color:#333">Tài khoản hoặc mật khẩu</strong> <span style="color: red;font-weight: bold; ">Không hợp lệ</span>
                        </div>
                    <?php
                    }
                    else{
                    $_SESSION["username"] = $_POST["username"];
                    ?>
                        <script type="text/javascript">
                            window.location="dashboard.php";
                        </script>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="footer text-center">
        <p>&copy; All rights reserved utter pompously</p>
    </div>

<script src="inc/js/jquery-2.2.4.min.js"></script>
<script src="inc/js/bootstrap.min.js"></script>
<script src="inc/js/custom.js"></script>
</body>
</html>