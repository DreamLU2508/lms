<?php
    session_start();
    if (!isset($_SESSION["id"])) {
        ?>
        <script type="text/javascript">
            window.location="index.php";
        </script>
        <?php
    }

    include 'inc/connection.php';
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        mysqli_query($link, "delete from book where id=$id");

        ?>
        <script type="text/javascript">
            alert("Xóa thành công");
            window.location="display-books.php";
        </script>
        <?php
    }
?>