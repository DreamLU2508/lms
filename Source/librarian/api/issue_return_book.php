<?php
    include '../inc/connection.php';

    class IssueReturnBook{
        public $iduser;
        public $nameuser;
        public $username;
        public $password;
        public $email;
        public $phone;
        public $address;
        public $utype;
        public $photo;
        public $status;
        public $idbook;
        public $booksissuedate;
        public $returndate;
        public $expirationdate;
        public $cost;
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

    
    if(isset($_POST['user_id'])){
        $array = array();
        $id = $_POST['user_id'];
        $res = mysqli_query($link, "SELECT users.id, name, username, password, email, phone, address, utype, photo, status, issue_book.book_id, issue_book.booksissuedate, return_book.returndate, return_book.expirationdate, return_book.cost, book.books_name, book.books_image, book.books_author_name, book.books_publication_name, book.books_purchase_date, book.books_price, book.books_quantity, book.books_availability, book.librarian_id, book.books_file FROM issue_book, return_book, book, users WHERE issue_book.user_id = return_book.user_id AND issue_book.book_id = return_book.book_id AND issue_book.book_id = book.id AND issue_book.user_id = users.id and users.id = '$id'");
        while ($row = mysqli_fetch_assoc($res)) {
            $tmp = new IssueReturnBook();
            $tmp->iduser = $row['id'];
            $tmp->nameuser = $row['name'];
            $tmp->username = $row['username'];
            $tmp->password = $row['password'];
            $tmp->email = $row['email'];
            $tmp->phone = $row['phone'];
            $tmp->address = $row['address'];
            $tmp->utype = $row['utype'];
            $tmp->photo = $row['photo'];
            $tmp->status = $row['status'];
            $tmp->idbook = $row['book_id'];
            $tmp->booksissuedate = $row['booksissuedate'];
            $tmp->returndate = $row['returndate'];
            $tmp->expirationdate = $row['expirationdate'];
            $tmp->cost = $row['cost'];
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

            array_push($array,$tmp);
        }
    }
    
    
    echo json_encode($array);
    mysqli_close($link);
?>