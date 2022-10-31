<?php
        use AdminController;

        // // Contains the url to post data
        // // this is my local server url
        // // demo is the folder name and
        // // demo1.php is other file
        // $url_path = 'http://localhost/lms/Source/librarian/api/add_issue_book.php';

        // // Data is an array of key value pairs
        // // to be reflected on the site
        // $data = array('book_id' => '1', 'user_id' => '1');

        // // Method specified whether to GET or
        // // POST data with the content specified
        // // by $data variable. 'http' is used
        // // even in case of 'https'

        // $options = array(
        //     'http' => array(
        //         'method' => 'POST',
        //         'header'  => 'Content-Type: application/x-www-form-urlencoded',
        //         'content' => http_build_query($data)
        //     )
        // );

        // // Create a context stream with
        // // the specified options
        // $stream = stream_context_create($options);

        // // The data is stored in the 
        // // result variable
        // $result = file_get_contents(
        //     $url_path,
        //     false,
        //     $stream
        // );

        // $json_array = json_decode($result, true);
        // print_r($result);

        // $bookController = new BookController();
    
        // $booksname = "Phân tích số lý thuyết";
        // $imagepath = "books-image/5ebaa3080bb0327177a67d697223498a41GxQsLNarL._SX328_BO1,204,203,200_.jpg";
        // $bauthorname = "Kendall Atkinson";
        // $bpubname = "Nhà xuất bản Đại Học Quốc Gia Hà Nội";
        // $bpurcdate = "15/03/19";
        // $bprice = 10;
        // $bquantity = 10;
        // $bavailability = 8;
        // $id = "1";
        // $filepath = "books-file/nalrs.pdf";

        // $result = $bookController->addBook($booksname, $imagepath, $bauthorname, $bpubname, $bpurcdate, $bprice, $bquantity, $bavailability, $id, $filepath);
        // $expect = "Thêm sách thành công";
        // print_r($result);

        // $userController = new UserController();

        // $name = "";
        // $username = "duc123";
        // $password = "123456";
        // $email = "duc@gmail.com";
        // $phone = "01932670148";
        // $address = "Hà Nội";
        // $utype  = "student";

        // if ($name == "" || $username == "" || $password == "" || $email == "" || $phone == "" || $address == "") {
        //     print_r("Các trường không được để trống!");
        // }
        // else {
        //     print_r("out");
        // }
        // $photo = "upload/avatar.jpg";


        // $sql_u = mysqli_query($this->link, "select * from users where username= '$username'");
        // $sql_e = mysqli_query($this->link, "select * from users where email= '$email'");
        // $sql_p = mysqli_query($this->link, "select * from users where phone= '$phone'");

        // if (mysqli_num_rows($sql_u) > 0) {
        //     print_r() "Tài khoản đã tồn tại";
        // } elseif (mysqli_num_rows($sql_e) > 0) {
        //     print_r() "Email đã tồn tại";
        // } elseif (mysqli_num_rows($sql_p) > 0) {
        //     print_r() "Số điện thoại đã tồn tại";
        // } elseif (strlen($username) < 6) {
        //     print_r() "Username quá ngắn";
        // } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        //     print_r() "Email không đúng định dạng";
        // } else {
        //     // $vkey = md5(time().$username);
        //     $sql = "INSERT INTO users values('','$name','$username','$password','$email','$phone','$address','$utype','$photo','yes')";
        //     $insert = mysqli_query($this->link, $sql);
        //     if ($insert) {
        //         print_r() "Thêm thành công!";
        //     } else {
        //         print_r() "Thêm thất bại";
        //     }
        // }

        $adminController = new AdminController();

        $name = "Hoàng Trung Đức";
        $phone = "01932670148";
        $address = "Hà Nội";
        $urlImage = "./tests/images/1553455987.jpg";

        $result = $adminController->updateAdmin($name, $phone, $address, $urlImage);
        var_dump($result);
?>