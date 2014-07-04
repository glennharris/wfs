<?php
include ("db.php"); 
include ("wfsfunc.php");
    // Build query for contacts
    $unum = $mysqli->real_escape_string($_POST["subpremise"]);
    $snum = $mysqli->real_escape_string($_POST["street_number"]);
    $sname = $mysqli->real_escape_string($_POST["route"]);
    $suburb = $mysqli->real_escape_string($_POST["locality"]);
    $pcode = $mysqli->real_escape_string($_POST["postal_code"]);
    $state = $mysqli->real_escape_string($_POST['administrative_area_level_1']);
    $country = $mysqli->real_escape_string($_POST['country']);
    
    $query = "SELECT STATE_ID FROM STATES WHERE DESCRIPTION = '$state';";
    $result = $mysqli->query($query);
    $row = $result->fetch_array();
    $state_id = $row['STATE_ID'];
    
    //$country_id - CREATE TABLE
    $email = $mysqli->real_escape_string($_POST["email"]);
    $phone = $mysqli->real_escape_string($_POST["phone"]);
    
    $query = "INSERT INTO CONTACTS (UNIT_NUMBER, STREET_NUMBER, STREET_NAME, SUBURB, POSTAL_CODE, STATE_ID, EMAIL, PHONE) VALUES ('$unum', '$snum', '$sname', '$suburb', '$pcode', '$state_id', '$email', '$phone');";
    if (!$mysqli->query($query)) {
        printf("Error message: %s\n", $mysqli->error);
    }
        
    $contact_id = $mysqli->insert_id;
    
    // Build query for names
    $fname = $mysqli->real_escape_string($_POST["fname"]);
    $lname = $mysqli->real_escape_string($_POST["lname"]);
    $dob = $mysqli->real_escape_string($_POST["dob"]);
    $gender = $mysqli->real_escape_string($_POST["gender"]);
    $mstatus = $mysqli->real_escape_string($_POST["mstatus"]);
    $curremp = $mysqli->real_escape_string($_POST["curremp"]);
    $jobtitle = $mysqli->real_escape_string($_POST["jobtitle"]);
    
    $query = "INSERT INTO NAMES (FIRST_NAME, LAST_NAME, DATE_OF_BIRTH, GENDER, MARITAL_STATUS, WORK_STATUS, JOB_TITLE, CONTACT_ID) VALUES ('$fname', '$lname', '$dob', '$gender', '$mstatus', '$curremp', '$jobtitle', '$contact_id');";

    if (!$mysqli->query($query)) {
        printf("Error message: %s\n", $mysqli->error);
    }
    
    $name_id = $mysqli->insert_id;
    
    // Health Issues
    
    
    // Insert assets
    
    // Insert liabilities
    
    



?>
