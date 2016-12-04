<?php

session_start();

if (!isset($_SESSION["userid"])) {
	die("You must be logged in to change your profile.");
}

$server_name =  "localhost";
$server_username = "platypus";
$server_password = "password";
$db_name = "platipi";

// create connection
$conn = new mysqli($server_name, $server_username, $server_password, $db_name);
if (!$conn) {
	die("Connection failed.");
}

if (isset($_POST["bio"]))
	require("update_bio.php");

if (isset($_POST["first_name"]))
	require("update_first_name.php");

if (isset($_POST["interests"]))
	require("update_interests.php");

echo "Profile updated successfully.";

?>