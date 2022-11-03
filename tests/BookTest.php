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
            $imagepath = "books-image/bia.jpg";
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
    public function LongbookPublicationName()
    {
        $bookController = new BookController();

        $booksname = "Phân tích số lý thuyết";
        $imagepath = "books-image/5ebaa3080bb0327177a67d697223498a41GxQsLNarL._SX328_BO1,204,203,200_.jpg";
        $bauthorname = "Kendall Atkinson";
        $bpubname = "Trong báo cáo chất vấn gửi tới Quốc hội đầu tuần này, Bộ trưởng Xây dựng Nguyễn Thanh Nghị cũng nhìn nhận, việc huy động vốn qua thị trường chứng khoán của doanh nghiệp bất động sản cần được giám sát. Việc này nhằm tránh đầu cơ, thổi giá trên thị trường.
        Trong báo cáo chất vấn gửi tới Quốc hội đầu tuần này, Bộ trưởng Xây dựng Nguyễn Thanh Nghị cũng nhìn nhận, việc huy động vốn qua thị trường chứng khoán của doanh nghiệp bất động sản cần được giám sát. Việc này nhằm tránh đầu cơ, thổi giá trên thị trường.
        Trong báo cáo chất vấn gửi tới Quốc hội đầu tuần này, Bộ trưởng Xây dựng Nguyễn Thanh Nghị cũng nhìn nhận, việc huy động vốn qua thị trường chứng khoán của doanh nghiệp bất động sản cần được giám sát. Việc này nhằm tránh đầu cơ, thổi giá trên thị trường.
        Trong báo cáo chất vấn gửi tới Quốc hội đầu tuần này, Bộ trưởng Xây dựng Nguyễn Thanh Nghị cũng nhìn nhận, việc huy động vốn qua thị trường chứng khoán của doanh nghiệp bất động sản cần được giám sát. Việc này nhằm tránh đầu cơ, thổi giá trên thị trường.
        Trong báo cáo chất vấn gửi tới Quốc hội đầu tuần này, Bộ trưởng Xây dựng Nguyễn Thanh Nghị cũng nhìn nhận, việc huy động vốn qua thị trường chứng khoán của doanh nghiệp bất động sản cần được giám sát. Việc này nhằm tránh đầu cơ, thổi giá trên thị trường.
        Trong báo cáo chất vấn gửi tới Quốc hội đầu tuần này, Bộ trưởng Xây dựng Nguyễn Thanh Nghị cũng nhìn nhận, việc huy động vốn qua thị trường chứng khoán của doanh nghiệp bất động sản cần được giám sát. Việc này nhằm tránh đầu cơ, thổi giá trên thị trường.
        Trong báo cáo chất vấn gửi tới Quốc hội đầu tuần này, Bộ trưởng Xây dựng Nguyễn Thanh Nghị cũng nhìn nhận, việc huy động vốn qua thị trường chứng khoán của doanh nghiệp bất động sản cần được giám sát. Việc này nhằm tránh đầu cơ, thổi giá trên thị trường.
        Trong báo cáo chất vấn gửi tới Quốc hội đầu tuần này, Bộ trưởng Xây dựng Nguyễn Thanh Nghị cũng nhìn nhận, việc huy động vốn qua thị trường chứng khoán của doanh nghiệp bất động sản cần được giám sát. Việc này nhằm tránh đầu cơ, thổi giá trên thị trường.";
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
        public function namePublicationNameEmpty()
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
    public function datefaildinhdang()
    {
        $bookController = new BookController();

        $booksname = "Phân tích số lý thuyết";
        $imagepath = "books-image/5ebaa3080bb0327177a67d697223498a41GxQsLNarL._SX328_BO1,204,203,200_.jpg";
        $bauthorname = "mot con vit";
        $bpubname = "Nhà xuất bản Đại Học Quốc Gia Hà Nội";
        $bpurcdate = "saidinhdangdate";
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
        public function pricebookfail()
        {
            $bookController = new BookController();
            $booksname = "Phân tích số lý thuyết";
            $imagepath = "books-image/5ebaa3080bb0327177a67d697223498a41GxQsLNarL._SX328_BO1,204,203,200_.jpg";
            $bauthorname = "Kendall Atkinson";
            $bpubname = "mot con vit";
            $bpurcdate = "15/03/19";
            $bprice = "saidinhdang";
            $bquantity = 10;
            $bavailability = 8;
            $id = "1";
            $filepath = "books-file/nalrs.pdf";
    
            $result = $bookController->addBook($booksname, $imagepath, $bauthorname, $bpubname, $bpurcdate, $bprice, $bquantity, $bavailability, $id, $filepath);
            $expect = "Tên nhà xuất bản không được ngắn hơn 6 kí tự";
            $this->assertTrue($result == $expect);
        }

        /** @test */
        public function numberbookfail()
        {
            $bookController = new BookController();
            $booksname = "Phân tích số lý thuyết";
            $imagepath = "books-image/5ebaa3080bb0327177a67d697223498a41GxQsLNarL._SX328_BO1,204,203,200_.jpg";
            $bauthorname = "Kendall Atkinson";
            $bpubname = "mot con vit";
            $bpurcdate = "15/03/19";
            $bprice = 10;
            $bquantity = "saidinhdang";
            $bavailability = 8;
            $id = "1";
            $filepath = "books-file/nalrs.pdf";
    
            $result = $bookController->addBook($booksname, $imagepath, $bauthorname, $bpubname, $bpurcdate, $bprice, $bquantity, $bavailability, $id, $filepath);
            $expect = "Tên nhà xuất bản không được ngắn hơn 6 kí tự";
            $this->assertTrue($result == $expect);
        }

                /** @test */
                public function numberbookkhongnhohon0()
                {
                    $bookController = new BookController();
                    $booksname = "Phân tích số lý thuyết";
                    $imagepath = "books-image/5ebaa3080bb0327177a67d697223498a41GxQsLNarL._SX328_BO1,204,203,200_.jpg";
                    $bauthorname = "Kendall Atkinson";
                    $bpubname = "mot con vit";
                    $bpurcdate = "15/03/19";
                    $bprice = 10;
                    $bquantity = -1;
                    $bavailability = 8;
                    $id = "1";
                    $filepath = "books-file/nalrs.pdf";
            
                    $result = $bookController->addBook($booksname, $imagepath, $bauthorname, $bpubname, $bpurcdate, $bprice, $bquantity, $bavailability, $id, $filepath);
                    $expect = "Tên nhà xuất bản không được ngắn hơn 6 kí tự";
                    $this->assertTrue($result == $expect);
                }

}
