<?php
    if(isset($_POST['submit'])){
        $image_name=$_FILES['f1']['name'];
        $file_name=$_FILES['file']['name'];
        $temp = explode(".", $image_name);
        $temp2 = explode(".", $file_name);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $newfilename2 = round(microtime(true)) . '.' . end($temp2);
        $imagepath="books-image/".$newfilename;
        $filepath="books-file/".$newfilename2;
        move_uploaded_file($_FILES["f1"]["tmp_name"],$imagepath);
        move_uploaded_file($_FILES["file"]["tmp_name"],$filepath);

        mysqli_query($link, "UPDATE book SET  books_name = '$_POST[booksname]',books_image = '$imagepath',books_author_name = '$_POST[bauthorname]',books_publication_name = '$_POST[bpubname]',books_purchase_date = '$_POST[bpurcdate]',books_price = '$_POST[bprice]',books_quantity = '$_POST[bquantity]',books_availability = '$_POST[bavailability]', librarian_id = '$_SESSION[id]',books_file = '$filepath' WHERE id = $_GET[id]");
        echo "ok";
    }