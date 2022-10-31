<?php
    namespace Source\librarian\controller;
    use DateTime;
    class BaseController {
        function validateDate($date, $format = 'dd/MM/YY')
        {
            $d = DateTime::createFromFormat($format, $date);
            return $d && $d->format($format) == $date;
        }
        

        public function checkImage($urlImage)
        {
            $mes = "Ảnh hợp lệ";
            
            // Kiểm tra định đạng
            $path_parts = pathinfo($urlImage);
            $s = $path_parts['extension'] == 'jpg' ;
            if($path_parts['extension'] != 'jpg' && $path_parts['extension'] != 'png' ) {
                $mes = "Lỗi định dạng";
            }

            
            // kiểm tra kích cỡ
            if(filesize($urlImage) >= 32*1024) {
                $mes = "Kích thước ảnh không phù hợp";
            }

            // kiểm tra độ phân giải
            $image = getimagesize($urlImage);
            if($image[0] != 137 && $image[1] != 177) {
                $mes = "Độ phân giải ảnh không phù hợp";
            }

            return $mes;
        }
    }
?>