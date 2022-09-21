<?php

include "Registration.php";

$dsn = "mysql:host=localhost;dbname=pdc10_db";
$db_user = "admin";
$db_pass = "root";

$pdo = new PDO($dsn, $db_user, $db_pass);

$result = Registration::handleUpload($_FILES['picture_path']);

if ($result !== FALSE) {

	// Save the registration form to the database
	$fileObj = new Registration($_POST['complete_name'], $_POST['email'], $_POST['password'], $result['path']);
	$result = $fileObj->save();

	$message = true;

} else {

	$message = false;

}
