<?php
session_start();
if (!isset($_SESSION["id"])) {
?>
    <script type="text/javascript">
        window.location = "index.php";
    </script>
<?php
}
include 'inc/header.php';
include 'inc/connection.php';
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $res = mysqli_query($link, "select * from book where id = $id");
    while ($row = mysqli_fetch_assoc($res)){
        $imgBook = $row['books_image'];
        $nameBook = $row['books_name'];
        $fileBook = $row['books_file'];
        $books_author_name = $row['books_author_name'];
        $books_publication_name = $row['books_publication_name'];
        $books_purchase_date = $row['books_purchase_date'];
        $price = $row['books_price'];
        $books_quantity = $row['books_quantity'];
        $books_availability = $row['books_availability'];
    }
}
?>

<div class="dashboard-content">
    <div class="dashboard-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left">
                        <p><span>bảng điều khiển</span></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right text-right">
                        <a href="dashboard.php"><i class="fas fa-home"></i>Trang chủ</a>
                        <span class="disabled">Thêm sách</span>
                    </div>
                </div>
            </div>
            <div class="bstore">
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="booksname" placeholder="Tên sách" required="" value='<?php echo $nameBook;?>'>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Ảnh sách
                                <br>
                                <img id = "filename" src="<?php echo $imgBook ?> " width="200px" height="320px" >
                                <input type="button" onclick="$('#f1').click()" value="chọn ảnh">
                                <input type="file" class="form-control" id = "f1" name="f1" style="display:none;" onchange="document.getElementById('filename').src = window.URL.createObjectURL(this.files[0])">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tệp sách
                                <br>
                                <span id = "filebook"> <?php $temp = explode("/", $fileBook); echo end($temp) ; ?></span>
                                <input type="button" onclick="$('#f2').click()" value="chọn ảnh">
                                <input type="file" class="form-control" id = "f2" name="file" required="" style="display:none;" onchange="document.getElementById('filebook').innerHTML = this.files[0].name">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="bauthorname" placeholder="Tác giả" required="" value="<?php echo $books_author_name;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="bpubname" placeholder="Tên xuất bản sách" required="" value="<?php echo $books_publication_name;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="bpurcdate" placeholder="Ngày mua sách" required="" value="<?php echo $books_purchase_date;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="bprice" placeholder="Giá sách" required="" value="<?php echo $price ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="bquantity" placeholder="Số lượng sách" required="" value="<?php echo $books_quantity ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="bavailability" placeholder="Sách có sẵn" required="" value="<?php echo $books_availability;?>">
                            </td>
                        </tr>
                    </table>
                    <div class="submit mt-20">
                        <input type="submit" name="submit" class="btn btn-info submit" value="Thêm sách">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    include 'inc/footer.php';
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
        ?><script type="text/javascript">
                    alert("Sửa thành công");
 	                window.location="display-books.php";
                </script>
                <?php        
    }
?>


