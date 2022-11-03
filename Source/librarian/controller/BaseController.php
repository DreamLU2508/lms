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
            $mes = [
                'result' => true,
                'mes' => "Ảnh chuẩn"
            ];
            
            // Kiểm tra định đạng
            $path_parts = pathinfo($urlImage);
            $s = $path_parts['extension'] == 'jpg' ;
            if($path_parts['extension'] != 'jpg' && $path_parts['extension'] != 'png' ) {
                $mes = [
                    'result' => false,
                    'mes' => "Lỗi định dạng"
                ];
                return $mes;
            }
            
            // kiểm tra kích cỡ
            if(filesize($urlImage) >= 32*1024) {
                $mes = [
                    'result' => false,
                    'mes' => "Kích thước ảnh không phù hợp"
                ];
                return $mes;
            }

            // kiểm tra độ phân giải
            $image = getimagesize($urlImage);
            if($image[0] != 137 && $image[1] != 177) {
                $mes = [
                    'result' => false,
                    'mes' => "Độ phân giải ảnh không phù hợp"
                ];
                return $mes;
            }

            return $mes;
        }
    }
?>