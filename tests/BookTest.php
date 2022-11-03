<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Source\librarian\controller\BookController;

include '../lms/Source/librarian/controller/BookController.php';

class BookTest extends TestCase
{
    /** @test */
    public function borrowBook()
    {
        $bookController = new BookController();
        $data = array('book_id' => '1', 'user_id' => '1');

        $result = $bookController->borrowBook($data);

        $this->assertTrue($result == "success");
    }

    /** @test */
    public function addBookSuccess()
    {
        $bookController = new BookController();

        $booksname = "Phân tích số lý thuyết";
        $imagepath = "books-image/5ebaa3080bb0327177a67d697223498a41GxQsLNarL._SX328_BO1,204,203,200_.jpg";
        $bauthorname = "Kendall Atkinson";
        $bpubname = "Nhà xuất bản Đại Học Quốc Gia Hà Nội";
        $bpurcdate = "15/03/19";
        $bprice = 10;
        $bquantity = 10;
        $bavailability = 8;
        $id = "1";
        $filepath = "books-file/nalrs.pdf";

        $result = $bookController->addBook($booksname, $imagepath, $bauthorname, $bpubname, $bpurcdate, $bprice, $bquantity, $bavailability, $id, $filepath);
        $expect = "Thêm sách thành công";
        $this->assertTrue($result == $expect);
    }

    /** @test */
    public function nameBookEmpty()
    {
        $bookController = new BookController();

        $booksname = "";
        $imagepath = "books-image/5ebaa3080bb0327177a67d697223498a41GxQsLNarL._SX328_BO1,204,203,200_.jpg";
        $bauthorname = "Kendall Atkinson";
        $bpubname = "Nhà xuất bản Đại Học Quốc Gia Hà Nội";
        $bpurcdate = "15/03/19";
        $bprice = 10;
        $bquantity = 10;
        $bavailability = 8;
        $id = "1";
        $filepath = "books-file/nalrs.pdf";

        $result = $bookController->addBook($booksname, $imagepath, $bauthorname, $bpubname, $bpurcdate, $bprice, $bquantity, $bavailability, $id, $filepath);
        $expect = "Tên sách không được ngắn hơn 6 kí tự!";
        $this->assertTrue($result == $expect);
    }

    /** @test */
    public function nameBookTooLong()
    {
        $bookController = new BookController();

        $booksname = "Phân tích số lý thuyết. Phân tích số lý thuyết. Phân tích số lý thuyết. Phân tích số lý thuyết. Phân tích số lý thuyết. Phân tích số lý thuyết. Phân tích số lý thuyết.Phân tích số lý thuyết. Phân tích số lý thuyết. Phân tích số lý thuyết. Phân tích số lý thuyết. Phân tích số lý thuyết. Phân tích số lý thuyết. Phân tích số lý thuyết. Phân tích số lý thuyết. Phân tích số lý thuyết. Phân tích số lý thuyết. Phân tích số lý thuyết";
        $imagepath = "books-image/5ebaa3080bb0327177a67d697223498a41GxQsLNarL._SX328_BO1,204,203,200_.jpg";
        $bauthorname = "Kendall Atkinson";
        $bpubname = "Nhà xuất bản Đại Học Quốc Gia Hà Nội";
        $bpurcdate = "15/03/19";
        $bprice = 10;
        $bquantity = 10;
        $bavailability = 8;
        $id = "1";
        $filepath = "books-file/nalrs.pdf";

        $result = $bookController->addBook($booksname, $imagepath, $bauthorname, $bpubname, $bpurcdate, $bprice, $bquantity, $bavailability, $id, $filepath);
        $expect = "Tên sách không dài quá 60 kí tự!";
        $this->assertTrue($result == $expect);
    }


    /** @test */
    public function authorNameEmpty()
    {
        $bookController = new BookController();

        $booksname = "Phân tích số lý thuyết";
        $imagepath = "books-image/5ebaa3080bb0327177a67d697223498a41GxQsLNarL._SX328_BO1,204,203,200_.jpg";
        $bauthorname = "";
        $bpubname = "Nhà xuất bản Đại Học Quốc Gia Hà Nội";
        $bpurcdate = "15/03/19";
        $bprice = 10;
        $bquantity = 10;
        $bavailability = 8;
        $id = "1";
        $filepath = "books-file/nalrs.pdf";

        $result = $bookController->addBook($booksname, $imagepath, $bauthorname, $bpubname, $bpurcdate, $bprice, $bquantity, $bavailability, $id, $filepath);
        $expect = "Tên tác giả không được ngắn hơn 6 kí tự!";
        $this->assertTrue($result == $expect);
    }

    /** @test */
    public function bookPublicationNameEmpty()
    {
        $bookController = new BookController();

        $booksname = "Phân tích số lý thuyết";
        $imagepath = "books-image/5ebaa3080bb0327177a67d697223498a41GxQsLNarL._SX328_BO1,204,203,200_.jpg";
        $bauthorname = "Kendall Atkinson";
        $bpubname = "";
        $bpurcdate = "15/03/19";
        $bprice = 10;
        $bquantity = 10;
        $bavailability = 8;
        $id = "1";
        $filepath = "books-file/nalrs.pdf";

        $result = $bookController->addBook($booksname, $imagepath, $bauthorname, $bpubname, $bpurcdate, $bprice, $bquantity, $bavailability, $id, $filepath);
        $expect = "Tên nhà xuất bản không được ngắn hơn 6 kí tự";
        $this->assertTrue($result == $expect);
    }

    /** @test */
    public function purchaseDateInvalid()
    {
        $bookController = new BookController();

        $booksname = "Phân tích số lý thuyết";
        $imagepath = "books-image/5ebaa3080bb0327177a67d697223498a41GxQsLNarL._SX328_BO1,204,203,200_.jpg";
        $bauthorname = "Kendall Atkinson";
        $bpurcdate = "///";
        $bprice = 10;
        $bquantity = 10;
        $bavailability = 8;
        $id = "1";
        $filepath = "books-file/nalrs.pdf";

        $result = $bookController->addBook($booksname, $imagepath, $bauthorname, $bpubname, $bpurcdate, $bprice, $bquantity, $bavailability, $id, $filepath);
        $expect = "Ngày mua không đúng định dạng";
        $this->assertTrue($result == $expect);
    }

     /** @test */
     public function priceInvalid()
     {
         $bookController = new BookController();
 
         $booksname = "Phân tích số lý thuyết";
         $imagepath = "books-image/5ebaa3080bb0327177a67d697223498a41GxQsLNarL._SX328_BO1,204,203,200_.jpg";
         $bauthorname = "Kendall Atkinson";
         $bpubname = "Nhà xuất bản Đại Học Quốc Gia Hà Nội";
         $bpurcdate = "15/03/19";
         $bprice = "Adb10";
         $bquantity = 10;
         $bavailability = 8;
         $id = "1";
         $filepath = "books-file/nalrs.pdf";
 
         $result = $bookController->addBook($booksname, $imagepath, $bauthorname, $bpubname, $bpurcdate, $bprice, $bquantity, $bavailability, $id, $filepath);
         $expect = "Giá sách không đúng định dạng";
         $this->assertEquals($result, $expect);
     }

}
