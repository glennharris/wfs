<?php

    // Decode JSON from form.
    $data = json_decode(file_get_contents("php://input"));

    // Split POST data into variables.
    $firstName = mysql_real_escape_string($data->firstName);
    $lastName = mysql_real_escape_string($data->lastName);
    $email = mysql_real_escape_string($data->email);
    $phone = mysql_real_escape_string($data->phone);
    $dob = mysql_real_escape_string($data->dob); // Probably need a date conversion here.
    $gender = mysql_real_escape_string($data->gender);
    $mstatus = mysql_real_escape_string($data->mstatus);
    $employed = mysql_real_escape_string($data->employed);
    $jobtitle = mysql_real_escape_string($data->jobtitle);
    $will = mysql_real_escape_string($data->will);
    $poa = mysql_real_escape_string($data->poa);
    $dependant = mysql_real_escape_string($data->dependant);
    $depnum = mysql_real_escape_string($data->depnum);
    

    // Testing
    echo $firstName;

?>
