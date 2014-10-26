<?php

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

echo json_encode($data);

?>
