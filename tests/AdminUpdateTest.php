<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Source\librarian\controller\AdminController;

class AdminUpdateTest extends TestCase
{
    /** @test */
    public function errorImage()
    {
        $adminController = new AdminController();

        $name = "Hoàng Trung Đức";
        $phone = "0193267014";
        $address = "Hà Nội";
        $urlImage = "C:\\xampp\\htdocs\\lms\\tests\\images\\1553455987.jpg";

        $result = $adminController->updateAdmin($name, $phone, $address, $urlImage);
        $expect = "Độ phân giải ảnh không phù hợp";
        $this->assertEquals($result, $expect);
    }

    /** @test */
    public function emptyName()
    {
        $adminController = new AdminController();

        $name = "";
        $phone = "01932670148";
        $address = "Hà Nội";
        $urlImage = "C:\\xampp\\htdocs\\lms\\tests\\images\\test.png";

        $result = $adminController->updateAdmin($name, $phone, $address, $urlImage);
        $expect = "Không được để trống các trường";
        $this->assertEquals($result, $expect);
    }


    

}
