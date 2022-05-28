<?php
    include "../inc/connection.php";
    class book{
        public $id;
        public $books_name;
        public $books_image;
        public $books_author_name;
        public $books_publication_name;
        public $books_purchase_date;
        public $books_price;
        public $books_quantity;
        public $books_availability;
        public $librarian_id;
        public $books_file;
    }

    if(isset($_POST['bookid'])){
        $array = array();
        $sql = "select * from book where id = '".$_POST[bookid]."'";
        $res = mysqli_query($link, $sql);
        while($row = mysqli_fetch_assoc($res)){
            $tmp = new book();
            $tmp->books_name = $row['books_name'];
            $tmp->books_image = $row['books_image'];
            $tmp->books_author_name = $row['books_author_name'];
            $tmp->books_publication_name = $row['books_publication_name'];
            $tmp->books_purchase_date = $row['books_purchase_date'];
            $tmp->books_price = $row['books_price'];
            $tmp->books_quantity = $row['books_quantity'];
            $tmp->books_availability = $row['books_availability'];
            $tmp->librarian_id = $row['librarian_id'];
            $tmp->books_file = $row['books_file'];
            array_push($array, $tmp);
        }

        echo json_encode($array);
        mysqli_close($link);
    }
?>