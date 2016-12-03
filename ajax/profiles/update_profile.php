<?php

if (!isset($_SESSION["userid"])) {
	die("You must be logged in to change your profile.");
}

if (isset($_POST["bio"]))
	require("update_bio.php");

if (isset($_POST["first_name"]))
	require("update_first_name.php");

if (isset($_POST["interests"]))
	require("update_interests.php");

echo "Profile updated successfully.";

?>