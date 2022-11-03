<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Source\librarian\controller\UserController;

include '../lms/Source/librarian/controller/UserController.php';

class AddUserTest extends TestCase
{
    /** @test */
    public function emptyName()
    {
        $userController = new UserController();

        $name = "";
        $username = "duchoang2508";
        $password = "12345678";
        $email = "duc442@gmail.com";
        $phone = "0193267014";
        $address = "Hà Nội";
        $utype  = "student";

        $result = $userController->addUser($name, $username, $password, $email, $phone, $address, $utype);
        $expect = "Các trường không được để trống!";
        $this->assertEquals($result, $expect);
    }

    /** @test */
    public function Namequangan()
    {
        $userController = new UserController();

        $name = "Đức";
        $username = "duchoang2508";
        $password = "12345678";
        $email = "duc442@gmail.com";
        $phone = "0193267014";
        $address = "Hà Nội";
        $utype  = "student";

        $result = $userController->addUser($name, $username, $password, $email, $phone, $address, $utype);
        $expect = "Tên người dùng quá ngắn";
        $this->assertEquals($result, $expect);
    }

    /** @test */
    public function Namequadai()
    {
        $userController = new UserController();

        $name = "Đức Hoàng Trung Đức  Đức Hoàng Trung Đức Đức Hoàng Trung Đức Đức Hoàng Trung Đức Đức Hoàng Trung Đức Đức Hoàng Trung Đức Đức Hoàng Trung Đức Đức Hoàng Trung Đức Đức Hoàng Trung Đức Đức Hoàng Trung Đức";
        $username = "duchoang2508";
        $password = "12345678";
        $email = "duc442@gmail.com";
        $phone = "0193267014";
        $address = "Hà Nội";
        $utype  = "student";

        $result = $userController->addUser($name, $username, $password, $email, $phone, $address, $utype);
        $expect = "Tên người dùng quá dài";
        $this->assertEquals($result, $expect);
    }

    /** @test */
    public function Namechuakytudacbiet()
    {
        $userController = new UserController();

        $name = "Đức Hoàng @#%";
        $username = "duchoang2508";
        $password = "12345678";
        $email = "duc442@gmail.com";
        $phone = "0193267014";
        $address = "Hà Nội";
        $utype  = "student";

        $result = $userController->addUser($name, $username, $password, $email, $phone, $address, $utype);
        $expect = "Tên người dùng không được có kí tự đặc biệt";
        $this->assertEquals($result, $expect);
    }


    /** @test */
    public function Usernamngan()
    {
        $userController = new UserController();

        $name = "Hoàng Trung Đức";
        $username = "duc2508";
        $password = "12345678";
        $email = "duc442@gmail.com";
        $phone = "0193267014";
        $address = "Hà Nội";
        $utype  = "student";

        $result = $userController->addUser($name, $username, $password, $email, $phone, $address, $utype);
        $expect = "Tài Khoản người dùng quá ngắn";
        $this->assertEquals($result, $expect);
    }

    /** @test */
    public function Usernamquadai()
    {
        $userController = new UserController();

        $name = "Hoàng Trung Đức";
        $username = "hoangtrungduc2508hoangtrungduc2508hoangtrungduc2508hoangtrungduc2508hoangtrungduc2508hoangtrungduc2508hoangtrungduc2508hoangtrungduc2508hoangtrungduc2508hoangtrungduc2508hoangtrungduc2508hoangtrungduc2508hoangtrungduc2508hoangtrungduc2508";
        $password = "12345678";
        $email = "duc442@gmail.com";
        $phone = "0193267014";
        $address = "Hà Nội";
        $utype  = "student";

        $result = $userController->addUser($name, $username, $password, $email, $phone, $address, $utype);
        $expect = "Tài Khoản người dùng quá dài";
        $this->assertEquals($result, $expect);
    }

    /** @test */
    public function Usernamchuakytudb()
    {
        $userController = new UserController();

        $name = "Hoàng Trung Đức";
        $username = "duc2508#@#$";
        $password = "12345678";
        $email = "duc442@gmail.com";
        $phone = "0193267014";
        $address = "Hà Nội";
        $utype  = "student";

        $result = $userController->addUser($name, $username, $password, $email, $phone, $address, $utype);
        $expect = "Tài Khoản người dùng không được có kí tự đặc biệt";
        $this->assertEquals($result, $expect);
    }

    /** @test */
    public function Passquangan()
    {
        $userController = new UserController();

        $name = "Hoàng Trung Đức";
        $username = "duc2508hoang";
        $password = "123456";
        $email = "duc442@gmail.com";
        $phone = "0193267014";
        $address = "Hà Nội";
        $utype  = "student";

        $result = $userController->addUser($name, $username, $password, $email, $phone, $address, $utype);
        $expect = "Mật khẩu người dùng quá ngắn";
        $this->assertEquals($result, $expect);
    }

    /** @test */
    public function Passquadai()
    {
        $userController = new UserController();

        $name = "Hoàng Trung Đức";
        $username = "duc2508hoang";
        $password = "123456178378888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888";
        $email = "duc442@gmail.com";
        $phone = "0193267014";
        $address = "Hà Nội";
        $utype  = "student";

        $result = $userController->addUser($name, $username, $password, $email, $phone, $address, $utype);
        $expect = "Mật khẩu người dùng quá dài";
        $this->assertEquals($result, $expect);
    }

    /** @test */
    public function Emailerror()
    {
        $userController = new UserController();

        $name = "Hoàng Trung Đức";
        $username = "duc2508hoang";
        $password = "12345678";
        $email = "duc442gmail.com";
        $phone = "01932670146";
        $address = "Hà Nội";
        $utype  = "student";

        $result = $userController->addUser($name, $username, $password, $email, $phone, $address, $utype);
        $expect = "Email không đúng định dạng";
        $this->assertEquals($result, $expect);
    }

    /** @test */
    public function SDTerror()
    {
        $userController = new UserController();

        $name = "Hoàng Trung Đức";
        $username = "duc2508hoang";
        $password = "12345678";
        $email = "duc442@gmail.com";
        $phone = "1932670144";
        $address = "Hà Nội";
        $utype  = "student";

        $result = $userController->addUser($name, $username, $password, $email, $phone, $address, $utype);
        $expect = "Số điện thoại không đúng định dạng";
        $this->assertEquals($result, $expect);
    }

    /** @test */
    public function checktrungusername()
    {
        $userController = new UserController();

        $name = "Nguyễn Thị Huyền";
        $username = "nguyenthuy2508";
        $password = "12345679";
        $email = "huyen442@gmail.com";
        $phone = "0193233254";
        $address = "Hà Nội";
        $utype  = "student";

        $result = $userController->addUser($name, $username, $password, $email, $phone, $address, $utype);
        $expect = "Tài khoản đã tồn tại";
        $this->assertEquals($result, $expect);
    }

    /** @test */
    public function checktrungemail()
    {
        $userController = new UserController();

        $name = "Nguyễn Thị Huyền";
        $username = "nguyenhuyen2508";
        $password = "12345679";
        $email = "thuy442@gmail.com";
        $phone = "0193233254";
        $address = "Hà Nội";
        $utype  = "student";

        $result = $userController->addUser($name, $username, $password, $email, $phone, $address, $utype);
        $expect = "Email đã tồn tại";
        $this->assertEquals($result, $expect);
    }

    /** @test */
    public function checktrungsdt()
    {
        $userController = new UserController();

        $name = "Nguyễn Đình Cương";
        $username = "nguyencuong2508";
        $password = "12345679";
        $email = "cuong442@gmail.com";
        $phone = "0193263254";
        $address = "Hà Nội";
        $utype  = "student";

        $result = $userController->addUser($name, $username, $password, $email, $phone, $address, $utype);
        $expect = "Số điện thoại đã tồn tại";
        $this->assertEquals($result, $expect);
    }
}


