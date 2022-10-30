<?php
    
    class BaseController {
        function validateDate($date, $format = 'dd/MM/YY')
        {
            $d = DateTime::createFromFormat($format, $date);
            return $d && $d->format($format) == $date;
        }
    }
?>