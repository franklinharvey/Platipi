<?php

$server_name =  "localhost";
$server_username = "platypus";
$server_password = "password";
$db_name = "platipi";

$bio = $_POST["bio"];

if (strlen($bio) > 255) {
	die("Bio cannot be more than 255 characters long.");
}

// escape unsecured input
$escaped_bio = mysqli_real_escape_string($conn, $bio);

// update bio
$sql = "UPDATE users SET bio='".$escaped_bio."' WHERE userid='".$_SESSION["userid"]."'";
$result = mysqli_query($conn, $sql);
if (!$result) {
	die("Could not update profile.");
}


?>