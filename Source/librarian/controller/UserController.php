<?php
    include '../inc/connection.php';

    function validateDate($date, $format = 'dd/MM/YY')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
    class UserController {
        public $link;
        public function __construct()
        {
            $link= mysqli_connect("localhost","root","");
            mysqli_select_db($link, "project_new");
            if(! $link ){
               die('Could not connect: ' );
            }
        }

       

    }
