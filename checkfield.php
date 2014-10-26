<?php
    include ("wfsfunc.php");
    $q = $_GET["q"];
    $s = $_GET["s"];

    if (!fCheck($q, $s, 255)) {
        echo "Fail";
    } else {
        echo $q;
    } 
?>
