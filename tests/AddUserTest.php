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

        $name = "Hoàn Trung Đức";
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

    //  /** @test */
    //  public function addSuccess()
    //  {
    //      $userController = new UserController();
 
    //      $name = "Đức";
    //      $username = "duc123";
    //      $password = "123456";
    //      $email = "duc@gmail.com";
    //      $phone = "01932670148";
    //      $address = "Hà Nội";
    //      $utype  = "student";
 
    //      $result = $userController->addUser($name, $username, $password, $email, $phone, $address, $utype);
    //      $expect = "Thêm thành công!";
    //      $this->assertTrue($result == $expect);
    //  }

}
