<?php

namespace Tests;
use PHPUnit\Framework\TestCase;
use BookController;
include '../lms/Source/librarian/controller/BookController.php';

class BookTest extends TestCase
{
    /** @test */
    public function borrowBook()
    {
        // Contains the url to post data
        // this is my local server url
        // demo is the folder name and
        // demo1.php is other file
        $url_path = 'http://localhost/lms/Source/librarian/api/add_issue_book.php';

        // Data is an array of key value pairs
        // to be reflected on the site
        $data = array('book_id' => '1', 'user_id' => '1');

        // Method specified whether to GET or
        // POST data with the content specified
        // by $data variable. 'http' is used
        // even in case of 'https'

        $options = array(
            'http' => array(
                'method' => 'POST',
                'header'  => 'Content-Type: application/x-www-form-urlencoded',
                'content' => http_build_query($data)
            )
        );

        // Create a context stream with
        // the specified options
        $stream = stream_context_create($options);

        // The data is stored in the 
        // result variable
        $result = file_get_contents(
            $url_path,
            false,
            $stream
        );

        $this->assertTrue($result == "success");
    }

    /** @test */
    public function addBook() {
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
}
