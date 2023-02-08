<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('difPourcent')){

        function difPourcent($est1,$est2){
            $prix1 = $est1;
            $prix2 = $est2;
            if ($prix2 < $prix1) {
                return "-" . (($prix1 - $prix2) * 100 / $prix1) . "%";
            }
            return "+" . (($prix2 - $prix1) * 100 / $prix1) . "%";
        }
    }
?>