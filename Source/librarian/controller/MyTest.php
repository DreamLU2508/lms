<?php
        $adminController = new Admin\AdminController();

        $name = "Hoàng Trung Đức";
        $phone = "01932670148";
        $address = "Hà Nội";
        $urlImage = "C:\\xampp\\htdocs\\lms\\tests\\images\\1553455987.jpg";
        
        $result = $adminController->updateAdmin($name, $phone, $address, $urlImage);
?>