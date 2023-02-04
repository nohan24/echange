<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    if (! function_exists('formatter')) {

        function formatter($price, $devise = 'Ar'){
            $price = str_split(strrev($price),3);
            $ret = '';
            foreach($price as $str){
                $ret .= ' ' . $str;
            }
            return strrev($ret) . $devise;
        }

    }
?>