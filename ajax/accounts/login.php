<?php

session_start();

$server_name =  "localhost";
$server_username = "platypus";
$server_password = "password";
$db_name = "platipi";

$email = $_POST['email'];
$password = $_POST['password'];

// create connection
$conn = new mysqli($server_name, $server_username, $server_password, $db_name);
if (!$conn) {
	die("Connection failed.");
}

// escape unsecure input
$escaped_email =  mysqli_real_escape_string($conn, $email);
$password = $_POST['password'];

// check if username/password combo is valid
$sql = "SELECT password_hash, userid FROM users WHERE email='".$escaped_email."'";
$result = mysqli_query($conn, $sql);
if (!$result) {
	die("Could not connect to database.");
}
if (mysqli_num_rows($result) == 0) {
	die("Email/password combo does not exist.");
}

$row = mysqli_fetch_row($result);
if (!password_verify($password, $row[0])) {
	die("Email/password combo does not exist.");
}

$_SESSION["userid"] = $row[1];

include("create_auth_token.php");

echo "Login successful."

?>