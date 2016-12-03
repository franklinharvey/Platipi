<?php

$server_name =  "localhost";
$server_username = "platypus";
$server_password = "password";
$db_name = "platipi";

$first_name = $_POST["first_name"];

if (strlen($first_name) > 20) {
	die("Your name cannot be more than 20 characters long.");
}

// escape unsecured input
$escaped_first_name = mysqli_real_escape_string($conn, $first_name);

// update first_name
$sql = "UPDATE users SET first_name='".$escaped_first_name."' WHERE userid='".$_SESSION["userid"]."'";
$result = mysqli_query($conn, $sql);
if (!$result) {
	die("Could not update profile.");
}

?>