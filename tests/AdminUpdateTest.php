<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Source\librarian\controller\AdminController;

class AdminUpdateTest extends TestCase
{
    

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


    /** @test */
    public function chieudaitenhople()
    {
        $adminController = new AdminController();

        $name = "thuythuy";
        $phone = "0193267014";
        $address = "Hà Nội";
        $urlImage = "C:\\xampp\\htdocs\\lms\\tests\\images\\test.png";

        $result = $adminController->updateAdmin($name, $phone, $address, $urlImage);
        $expect = "Cập nhật thành công";
        $this->assertEquals($result, $expect);
    }
        /** @test */
    public function chieudaitenngan()
    {
        $adminController = new AdminController();
    
        $name = "thuy";
        $phone = "0193267014";
        $address = "hanoissssss";
        $urlImage = "C:\\xampp\\htdocs\\lms\\tests\\images\\test.png";
    
        $result = $adminController->updateAdmin($name, $phone, $address, $urlImage);
        $expect = "Tên quá ngắn";
        $this->assertEquals($result, $expect);
    }

    /** @test */
    public function tenchuakytudacbiet()
    {
        $adminController = new AdminController();

        $name = "thuythuy@@";
        $phone = "0193267014";
        $address = "hanoissssss";
        $urlImage = "C:\\xampp\\htdocs\\lms\\tests\\images\\test.png";

        $result = $adminController->updateAdmin($name, $phone, $address, $urlImage);
        $expect = "Tên không thể có kí tự đặc biệt";
        $this->assertEquals($result, $expect);
    }
    
    /** @test */
    public function emptySDT()
    {
        $adminController = new AdminController();

        $name = "thuythuy";
        $phone = "";
        $address = "hanoissssss";
        $urlImage = "C:\\xampp\\htdocs\\lms\\tests\\images\\test.png";

        $result = $adminController->updateAdmin($name, $phone, $address, $urlImage);
        $expect = "Không được để trống các trường";
        $this->assertEquals($result, $expect);
    }
 
    /** @test */
    public function SDThople()
    {
        $adminController = new AdminController();

        $name = "thuythuy";
        $phone = "0193267014";
        $address = "hanoissssss";
        $urlImage = "C:\\xampp\\htdocs\\lms\\tests\\images\\test.png";

        $result = $adminController->updateAdmin($name, $phone, $address, $urlImage);
        $expect = "Cập nhật thành công";
        $this->assertEquals($result, $expect);
    }

    /** @test */
    public function SDTquadaiquangan()
    {
        $adminController = new AdminController();

        $name = "thuythuy";
        $phone = "0193267014578";
        $address = "hanoissssss";
        $urlImage = "C:\\xampp\\htdocs\\lms\\tests\\images\\test.png";

        $result = $adminController->updateAdmin($name, $phone, $address, $urlImage);
        $expect = "Số điện thoại không hợp lệ";
        $this->assertEquals($result, $expect);
    }

    /** @test */
    public function SDTchuachuvakytudacbiet()
    {
        $adminController = new AdminController();

        $name = "thuythuy";
        $phone = "0193267014u@";
        $address = "hanoissssss";
        $urlImage = "C:\\xampp\\htdocs\\lms\\tests\\images\\test.png";

        $result = $adminController->updateAdmin($name, $phone, $address, $urlImage);
        $expect = "Số điện thoại không hợp lệ";
        $this->assertEquals($result, $expect);
    }


    /** @test */
    public function diachiquangan()
    {
        $adminController = new AdminController();

        $name = "thuythuy";
        $phone = "0193267014";
        $address = "hanoi";
        $urlImage = "C:\\xampp\\htdocs\\lms\\tests\\images\\test.png";

        $result = $adminController->updateAdmin($name, $phone, $address, $urlImage);
        $expect = "Địa chỉ quá ngắn";
        $this->assertEquals($result, $expect);
    }

     /** @test */
     public function diachiquadai()
     {
         $adminController = new AdminController();
 
         $name = "thuythuy";
         $phone = "0193267014";
         $address = "ha noi nghin nam van hien van mieu quoc tu giam lang bac hoi an quang binh thanh hoa nghe an ninh binh han quoc nam dinh hung yen thai binh xin chao viet nam xin chao omg nhom 7 so mot ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";
         $urlImage = "C:\\xampp\\htdocs\\lms\\tests\\images\\test.png";
 
         $result = $adminController->updateAdmin($name, $phone, $address, $urlImage);
         $expect = "Địa chỉ quá dài";
         $this->assertEquals($result, $expect);
     }

      /** @test */
      public function diachikhonghople()
      {
          $adminController = new AdminController();
  
          $name = "thuythuy";
          $phone = "0193267014";
          $address = "ha noi nghin nam van hien @$$";
          $urlImage = "C:\\xampp\\htdocs\\lms\\tests\\images\\test.png";
  
          $result = $adminController->updateAdmin($name, $phone, $address, $urlImage);
          $expect = "Địa chỉ không thể có kí tự đặc biệt";
          $this->assertEquals($result, $expect);
      }

    /** @test */
    public function phangiaiImage()
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
    public function kichcoImage()
    {
        $adminController = new AdminController();

        $name = "Hoàng Trung Đức";
        $phone = "0193267014";
        $address = "Hà Nội";
        $urlImage = "C:\\xampp\\htdocs\\lms\\tests\\images\\duccho.jpg";

        $result = $adminController->updateAdmin($name, $phone, $address, $urlImage);
        $expect = "Kích thước ảnh không phù hợp";
        $this->assertEquals($result, $expect);
    }
    /** @test */
    public function dinhdangImage()
    {
        $adminController = new AdminController();

        $name = "Hoàng Trung Đức";
        $phone = "0193267014";
        $address = "Hà Nội";
        $urlImage = "C:\\xampp\\htdocs\\lms\\tests\\images\\1.docx";

        $result = $adminController->updateAdmin($name, $phone, $address, $urlImage);
        $expect = "Lỗi định dạng";
        $this->assertEquals($result, $expect);
    }
}
