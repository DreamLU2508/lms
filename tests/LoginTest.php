<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Source\librarian\controller\UserController;

// include '../Source/librarian/controller/BookController.php';

class LoginTest extends TestCase
{
    // public function loginSuccess()
    // {
    //     // Contains the url to post data
    //     // this is my local server url
    //     // demo is the folder name and
    //     // demo1.php is other file
    //     $url_path = 'http://localhost/lms/Source/librarian/api/login.php';

    //     // Data is an array of key value pairs
    //     // to be reflected on the site
    //     $data = array('username' => 'duc123', 'password' => '123456');

    //     // Method specified whether to GET or
    //     // POST data with the content specified
    //     // by $data variable. 'http' is used
    //     // even in case of 'https'

    //     $options = array(
    //         'http' => array(
    //             'method' => 'POST',
    //             'header'  => 'Content-Type: application/x-www-form-urlencoded',
    //             'content' => http_build_query($data)
    //         )
    //     );

    //     // Create a context stream with
    //     // the specified options
    //     $stream = stream_context_create($options);

    //     // The data is stored in the 
    //     // result variable
    //     $result = file_get_contents(
    //         $url_path,
    //         false,
    //         $stream
    //     );

    //     $json_array = json_decode($result, true);
    //     $this->assertTrue($json_array[0]["username"] != null);

    //     // $base = new BaseController();
    //     // $this->assertTrue($base->validateDate("12/12/2022"));
    // }

    /** @test */
    public function usernameEmpty()
    {
        $userController = new UserController();

        $username = "";
        $password = "123456";

        $result = $userController->login($username, $password);
        $expect = "Các trường không được để trống!";
        $this->assertTrue($result == $expect);
    }

    /** @test */
    public function passwordEmpty()
    {
        $userController = new UserController();

        $username = "duc123";
        $password = "";

        $result = $userController->login($username, $password);
        $expect = "Các trường không được để trống!";
        $this->assertTrue($result == $expect);
    }

    /** @test */
    public function usernameTooShort()
    {
        $userController = new UserController();

        $username = "duc123";
        $password = "123456";

        $result = $userController->login($username, $password);
        $expect = "Username không được ngắn hơn 8 kí tự!";
        $this->assertTrue($result == $expect);
    }

    /** @test */
    public function passTooShort()
    {
        $userController = new UserController();

        $username = "cuong1234567";
        $password = "123456";

        $result = $userController->login($username, $password);
        $expect = "Mật khẩu không được ngắn hơn 8 kí tự!";
        $this->assertTrue($result == $expect);
    }

    /** @test */
    public function passTooLong()
    {
        $userController = new UserController();

        $username = "cuong1234567";
        $password = "1234567891011121314144343";

        $result = $userController->login($username, $password);
        $expect = "Mật khẩu không được dài hơn 16 kí tự!";
        $this->assertTrue($result == $expect);
    }

    /** @test */
    public function loginSuccess()
    {
        $userController = new UserController();

        $username = "NguyenCuong";
        $password = "12345678";

        $result = $userController->login($username, $password);
        $expect = "Thành công!";
        $this->assertTrue($result == $expect);
    }

    /** @test */
    public function loginFail()
    {
        $userController = new UserController();

        $username = "NguyenCuong";
        $password = "123456789";

        $result = $userController->login($username, $password);
        $expect = "Tài khoản không tồn tại!";
        $this->assertTrue($result == $expect);
    }
}
