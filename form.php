<?php
/*
$errors = array();
$data = array();

if (empty($_POST['firstName']))
    $errors['firstName'] = 'First name is required.';

if (empty($_POST['lastName']))
    $errors['lastName'] = 'Last name is required.';
    
if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo $_POST['firstName'];
*/

$data = json_decode(file_get_contents("php://input"));
$firstName = mysql_real_escape_string($data->firstName);
$lastName = mysql_real_escape_string($data->lastName);

echo $firstName;

?>
