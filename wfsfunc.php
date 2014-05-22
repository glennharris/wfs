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
    $type = 'is_' . $type;
    
    if (!$type($string)) {
        return FALSE;
    } elseif (empty($string)) {
        return FALSE;
    } else if (strlen($string) > $length) {
        return FALSE;
    } else {
        return TRUE;
    }
}

?>
