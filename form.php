<?php
    include ("db.php"); 
    //include ("wfsfunc.php");
    
    // Decode JSON from form.
    $data = json_decode(file_get_contents("php://input"));
    /*
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
    
    $email = $mysqli->real_escape_string($data->email);
    $phone = $mysqli->real_escape_string($data->phone);
    
    $query = "INSERT INTO CONTACTS (UNIT_NUMBER, STREET_NUMBER, STREET_NAME, SUBURB, POSTAL_CODE, STATE_ID, EMAIL, PHONE) VALUES ('$unum', '$snum', '$sname', '$suburb', '$pcode', '$state_id', '$email', '$phone');";
    if (!$mysqli->query($query)) {
        printf("Error message: %s\n", $mysqli->error);
    }
        
    $contact_id = $mysqli->insert_id;
*/
    // Split POST data into variables.
    $fname = $mysqli->real_escape_string($data->fname);
    $lname = $mysqli->real_escape_string($data->lname);
    $dob = $mysqli->real_escape_string($data->dob); // Probably need a date conversion here.
    $gender = $mysqli->real_escape_string($data->gender);
    $mstatus = $mysqli->real_escape_string($data->mstatus);
    $employed = $mysqli->real_escape_string($data->employed);
    $jobtitle = $mysqli->real_escape_string($data->jobtitle);
    $will = $mysqli->real_escape_string($data->will);
    $poa = $mysqli->real_escape_string($data->poa);
    $dependant = $mysqli->real_escape_string($data->dependant);
    $depnum = $mysqli->real_escape_string($data->depnum);
    $smoker = $mysqli->real_escape_string($data->smoker);
    $healthissue = $mysqli->real_escape_string($data->healthissue);
    
    // Name query
    $query = "INSERT INTO NAMES (FIRST_NAME, LAST_NAME, DATE_OF_BIRTH, GENDER, MARITAL_STATUS, WORK_STATUS, JOB_TITLE, WILL, POWER_OF_ATTORNEY, HAS_DEPENDANTS, NUM_DEPENDANTS, SMOKER, HEALTH_ISSUES) VALUES ('$fname', '$lname', '$dob', '$gender', '$mstatus', '$employed', '$jobtitle', '$will', '$poa', '$dependant', '$depnum', '$smoker', '$healthissue' );";

    if (!$mysqli->query($query)) {
        printf("Error message: %s\n", $mysqli->error);
    }
    
    $name_id = $mysqli->insert_id;

    // Testing
    echo $fname . " " . $lname . " " . $dob;

?>
