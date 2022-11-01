<?php
    namespace Source\librarian\controller;
    use Source\librarian\controller\BaseController;
    
    class AdminController {
        public $link;
        public function __construct()
        {
            $link= mysqli_connect("localhost","root","");
            mysqli_select_db($link, "project_new");
            if(! $link ){
               die('Could not connect: ' );
            }
        }    

        public function updateAdmin($name, $phone, $address, $urlImage) {
            if($name == "" || $phone == "" || $address == "") {
                return "Không được để trống các trường";
            }

            // kiểm tra trường Họ Tên
            if(strlen($name) < 8) {
                return "Tên quá ngắn";
            } else if (strlen($name) > 50) {
                return "Tên quá dài";
            }
            if(!preg_match("/^[a-z0-9\s\ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/i", $name)) {
                return "Tên không thể có kí tự đạc biệt";
            }

            // kiểm tra trường Số điện thoại
            if($phone[0] != '0' || !preg_match("/^[0-9]+$/", $phone) || strlen($phone) != 10) {
                return "Số điện thoại không hợp lệ";
            }

            // kiểm tra ảnh
            $validate = new BaseController();
            $mes = $validate->checkImage($urlImage);
            if(!$mes['result']) {
                return $mes['mes'];
            }

            // Kiểm tra trường địa chỉ
            if(strlen($address) < 6) {
                return "Địa chỉ quá ngắn";
            } else if (strlen($address) > 256) {
                return "Địa chỉ quá dài";
            }
            if(preg_match("/^[a-z0-9\s\-,.ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/i", $address)) {
                return "Địa chỉ không thể có kí tự đặc biệt";
            }
            return 'Cập nhật thành công';
        }

    }
