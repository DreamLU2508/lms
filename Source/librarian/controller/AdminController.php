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

            $validate = new BaseController();
            $mes = $validate->checkImage($urlImage);
            return $mes;
        }

    }
