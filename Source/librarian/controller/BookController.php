<?php
   namespace Source\librarian\controller;
   use Source\librarian\controller\BaseController;
    
    class BookController {
        public $link;
        public function __construct()
        {
            $link= mysqli_connect("localhost","root","");
            mysqli_select_db($link, "project_new");
            if(! $link ){
               die('Could not connect: ' );
            }
        }

        public function addBook($booksname, $imagepath, $bauthorname, $bpubname, $bpurcdate, $bprice, $bquantity, $bavailability, $id, $filepath) {
            $base = new BaseController();
            if(strlen($booksname) > 60) {
                return "Tên sách không dài quá 60 kí tự!";
            } else if(strlen($booksname) < 6) {
                return "Tên sách không được ngắn hơn 6 kí tự!";
            } 
            if(strlen($bauthorname) > 60) {
                return "Tên tác giả không dài quá 60 kí tự!";
            } else if(strlen($bauthorname) < 6) {
                return "Tên tác giả không được ngắn hơn 6 kí tự!";
            }
            if(strlen($bpubname) > 200) {
                return "Tên nhà xuất bản không được dài quá 200 kí tự";
            } else if(strlen($bpubname) < 6) {
                return "Tên nhà xuất bản không được ngắn hơn 6 kí tự";
            }
            if(!$base->validateDate($bpurcdate)) {
                return "Ngày mua không đúng định dạng";
            }
            if(is_numeric($bprice)) {
                return "Giá sách không đúng định dạng";
            }
            if(is_numeric($bquantity)) {
                return "Số lượng sách không đúng định dạng";
            } else if($bquantity < 0) {
                return "Số lượng sách không được nhỏ hơn 0";
            }
            $result = mysqli_query($this->link, "insert into book values('','$booksname','$imagepath','$$bauthorname','$bpubname','$bpurcdate','$bprice','$bquantity','$bavailability','$id','$filepath')");
            if($result) {
                return "Thêm sách thành công";
            } else {
                return "Thêm sách thất bại";
            }
        }

        // delete book
        


    }
