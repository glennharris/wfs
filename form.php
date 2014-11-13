<?php
    include ("db.php"); 
    //include ("wfsfunc.php");
    
    // Decode JSON from form.
    $data = json_decode(file_get_contents("php://input"));
    
    // Address for contacts
    $unum = $mysqli->real_escape_string($data->unum);
    $snum = $mysqli->real_escape_string($data->snum);
    $sname = $mysqli->real_escape_string($data->sname);
    $suburb = $mysqli->real_escape_string($data->suburb);
    $pcode = $mysqli->real_escape_string($data->pcode);
    $state = $mysqli->real_escape_string($data->state);
    $country = $mysqli->real_escape_string($data->country);
    
    $query = "SELECT STATE_ID FROM STATES WHERE DESCRIPTION = '$state';";
    $result = $mysqli->query($query);
    if (!$result) {
        printf("Error message: %s\n", $mysqli->error);
    } else {
        $row = $result->fetch_array();
        $state_id = $row['STATE_ID'];
    }
    
    $email = mysql_real_escape_string($data->email);
    $phone = mysql_real_escape_string($data->phone);
    
    $query = "INSERT INTO CONTACTS (UNIT_NUMBER, STREET_NUMBER, STREET_NAME, SUBURB, POSTAL_CODE, STATE_ID, EMAIL, PHONE) VALUES ('$unum', '$snum', '$sname', '$suburb', '$pcode', '$state_id', '$email', '$phone');";
    if (!$mysqli->query($query)) {
        printf("Error message: %s\n", $mysqli->error);
    }
        
    $contact_id = $mysqli->insert_id;

    // Split POST data into variables.
    $fname = mysql_real_escape_string($data->fname);
    $lname = $data->lname;
    
    $dob = mysql_real_escape_string($data->dob); // Probably need a date conversion here.
    $gender = mysql_real_escape_string($data->gender);
    $mstatus = mysql_real_escape_string($data->mstatus);
    $employed = mysql_real_escape_string($data->employed);
    $jobtitle = mysql_real_escape_string($data->jobtitle);
    $will = mysql_real_escape_string($data->will);
    $poa = mysql_real_escape_string($data->poa);
    $dependant = mysql_real_escape_string($data->dependant);
    $depnum = mysql_real_escape_string($data->depnum);
    $smoker = mysql_real_escape_string($data->smoker);
    $healthissue = mysql_real_escape_string($data->healthissue);
    

    // Testing
    echo $fname;

?>
