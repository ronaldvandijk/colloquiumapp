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

    function ellipsis($in, $length)
    {
        return strlen($in) > $length ? substr($in,0,$length)."..." : $in;
    }
?>