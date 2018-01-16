<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('dinamicMakeDate'))
{
    function dinamicMakeDate($date)
    {
        $objectDate = "";
        
        if(strrpos($date,"/")){
            $objectDate = DateTime::createFromFormat('d/m/Y', $date);
            return $objectDate; 
        }

        if($objectDate = DateTime::createFromFormat('j-M-Y', $date)){
        	return $objectDate;
        }elseif ($objectDate = DateTime::createFromFormat('d-m-Y', $date)) {
        	return $objectDate;
        	
        }elseif($objectDate = DateTime::createFromFormat('Y-m-d', $date)){
            return $objectDate;
            
        }

    }   
}