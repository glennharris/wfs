<?php
    include ("wfsfunc.php");
    $q = $_GET["q"];
    $d = fCheck($q, 'string', 25);
    if (!$d) {
        echo "Please enter a value";
        echo $d;
    } else {
        echo $q;
    } 
?>
