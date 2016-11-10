<?php
    /**
     * Format date 
     * 
     * @param   String $format
     * @param   String $date
     * @return  String
     */
    function format($format, $date)
    {
        return strval(date($format, strtotime($date)));
    }
?>