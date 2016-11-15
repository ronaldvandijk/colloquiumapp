<?php
/**
 * helpers.php
 *
 * A simple file to include some basic functions
 *
 * @package      Some Package
 * @subpackage   Some Subpackage
 * @category     Some Category
 * @author       Timothy de Jong
 */

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

    /**
     * @param $in
     * @param $length
     * @return string
     */
    function ellipsis($in, $length)
    {
        return strlen($in) > $length ? substr($in,0,$length)."..." : $in;
    }
?>