<?php

session_start();

$server_name =  "localhost";
$server_username = "platypus";
$server_password = "password";
$db_name = "platipi";

$email = $_POST['email'];
$first_name = $_POST['first_name'];
$password = $_POST['password'];

// check if email fits requirements
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	die("Email is not valid.");
}

// check if first name fits requirements
if (strlen($first_name) > 20) {
	die("First name cannot be more than 20 characters long.");
}
if (strlen($first_name) < 1) {
	die("First name must be at least 1 character long.");
}

// check if password fits requirements
if (strlen($password) < 8) {
	die("Password must be at least 8 characters long.");
}

// create connection
$conn = new mysqli($server_name, $server_username, $server_password, $db_name);
if (!$conn) {
	die("Connection failed.");
}

// escape unsecure input
$escaped_email = mysqli_real_escape_string($conn, $email);
$escaped_first_name =  mysqli_real_escape_string($conn, $first_name);
$hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// check if username is already registered
$sql = "SELECT * FROM users WHERE email='".$escaped_email."'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) >= 1) {
	die("Account already registered under that email.");
}

// register user
$sql = "INSERT INTO users (email, first_name, password_hash)
	VALUES ('".$escaped_email."', '".$escaped_first_name."', '".$hashed_password."')";
$result = mysqli_query($conn, $sql);
if (!$result) {
	die("Registration failed.");
}

$_SESSION["userid"] = mysqli_insert_id($conn);

include("create_auth_token.php");

echo "Registration successful.";

?>