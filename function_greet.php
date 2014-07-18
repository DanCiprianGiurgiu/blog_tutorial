<?php
/**
 * Created by PhpStorm.
 * User: Dan
 * Date: 7/16/14
 * Time: 12:40 PM
 */
function greet ($time){
    if ($time<12 )
    {
        return "buna dimineata";
    }

    elseif( $time<18 )
    {
        return "buna ziua";
    }
    else{
        return "neata ";

    }
}
$greeting = greet(14) ;

echo "$greeting ce mai faci ?";