<?php
// ----------------------------------------------/
// Wiseman Financial Services                    /
// http://www.wisemanfs.com.au                   /
// Online Financial Advice Web App               /                         
// File: PHP helper functions (wfsfunc.php)      /
// Last Modified: 22/5/2014                      /
// Author: Glenn Harris (glenn.harris@gmail.com) /
//-----------------------------------------------/

// Server side validation functions
// Checks form inputs for type and length
function fCheck($string, $type, $length) {
    $isValid = true;
    
    if ($type == 'email') {
        if (!filter_var($string, FILTER_VALIDATE_EMAIL)) { 
            $isValid = false; 
        }
    } else {
        $type = 'is_' . $type;
        
        if (!$type($string)) {
            $isValid = false;
        } elseif (empty($string)) {
            $isValid = false;
        } else {
            $isValid = false;
        }   
    }
    
    return $isValid;
}     
?>
